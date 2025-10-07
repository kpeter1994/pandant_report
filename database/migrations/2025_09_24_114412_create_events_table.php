<?php

use App\Models\Bus;
use App\Models\DailyReport;
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
        Schema::create('traffic_events', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(DailyReport::class);
            $table->foreignIdFor(Bus::class);

            $table->string('title');
            $table->text('description')->nullable();
            $table->text('dispatch')->nullable();
            $table->time('event_time')->nullable();
            $table->integer('damage_value')->default(0);
            $table->integer('personal_injury')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('traffic_events');
    }
};
