FROM node:20-alpine AS node_build

WORKDIR /app
ENV WAYFINDER_DISABLE=true

# Csak a package fájlokat másoljuk először a gyorsabb buildhez
COPY package*.json ./
RUN npm install

# Teljes frontend kód másolása és build
COPY . .
RUN npm run build


FROM php:8.3-fpm AS php_build

RUN apt-get update && apt-get install -y \
    git unzip libpq-dev libpng-dev libonig-dev libxml2-dev curl \
    libzip-dev zlib1g-dev libicu-dev \
    && docker-php-ext-install pdo pdo_mysql pdo_pgsql mbstring exif pcntl bcmath gd intl zip \
    && rm -rf /var/lib/apt/lists/*

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer


WORKDIR /var/www/html
COPY . .
COPY --from=node_build /app/public ./public

RUN composer install --no-dev --optimize-autoloader \
    && php artisan config:clear \
    && php artisan route:clear \
    && php artisan view:clear \
    && chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

EXPOSE 9100
CMD ["php-fpm"]

FROM nginx:1.27-alpine AS nginx_build
# Nginx konfig
COPY ./nginx/laravel.conf /etc/nginx/conf.d/default.conf
# Csak a public mappa kerül bele (index.php + buildelt assetek + a storage szimlink)
COPY --from=php_build /var/www/html/public /var/www/html/public
