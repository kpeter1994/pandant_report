<?php

use App\Models\Bus;
use App\Models\ServiceType;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('service_worksheets', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(ServiceType::class);
            $table->foreignIdFor(Bus::class);
            $table->datetime('start');
            $table->datetime('end')->nullable();
            $table->text('description')->nullable();
            $table->boolean('open')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_worksheets');
    }
};
