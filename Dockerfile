# ================================================================
# 1️⃣ PHP építési fázis – Laravel + Node build egyben
# ================================================================
FROM php:8.3-fpm AS php_build

# Alap csomagok + Node.js + NPM
RUN apt-get update && apt-get install -y \
    git unzip curl libzip-dev zlib1g-dev libpng-dev libonig-dev libxml2-dev libpq-dev \
    libicu-dev gnupg \
    && curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get install -y nodejs \
    && docker-php-ext-install pdo pdo_mysql pdo_pgsql mbstring exif pcntl bcmath gd intl zip \
    && rm -rf /var/lib/apt/lists/*

# Composer bemásolása
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Munkakönyvtár
WORKDIR /var/www/html

# A teljes Laravel projekt bemásolása
COPY . .

# Függőségek telepítése és build
RUN composer install --no-dev --optimize-autoloader \
    && npm install \
    && npm run build \
    && php artisan config:clear \
    && php artisan route:clear \
    && php artisan view:clear \
    && chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

EXPOSE 9100
CMD ["php-fpm"]

# ================================================================
# 2️⃣ Nginx fázis – kiszolgálás
# ================================================================
FROM nginx:1.27-alpine AS nginx_build

# Nginx konfiguráció
COPY ./nginx/laravel.conf /etc/nginx/conf.d/default.conf

# Csak a public mappa kerül be
COPY --from=php_build /var/www/html/public /var/www/html/public
