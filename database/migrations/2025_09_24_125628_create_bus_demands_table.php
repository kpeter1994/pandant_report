<?php

use App\Models\BusTypes;
use App\Models\DailyReport;
use App\Models\Site;
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
        Schema::create('bus_demands', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(DailyReport::class);
            $table->foreignIdFor(Site::class);
            $table->foreignIdFor(BusTypes::class);
            $table->integer('garden');
            $table->integer('got');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bus_demands');
    }
};
