<?php

use App\Models\Bus;
use App\Models\ServiceWorksheet;
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
        Schema::create('bus_service_worksheet', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Bus::class);
            $table->foreignIdFor(ServiceWorksheet::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bus_service_worksheet');
    }
};
