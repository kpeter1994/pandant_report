<?php

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
        Schema::table('traffic_events', function (Blueprint $table) {
            $table->foreignIdFor(\App\Models\User::class)->nullable();
            $table->boolean('alien_fault')->default(false);
            $table->boolean('elimination')->default(false);
            $table->boolean('extraordinary')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('traffic_events', function (Blueprint $table) {
            // A foreign drop-ot teljesen hagyjuk el
            if (Schema::hasColumn('traffic_events', 'user_id')) {
                $table->dropColumn('user_id');
            }

            if (Schema::hasColumn('traffic_events', 'alien_fault')) {
                $table->dropColumn('alien_fault');
            }

            if (Schema::hasColumn('traffic_events', 'elimination')) {
                $table->dropColumn('elimination');
            }

            if (Schema::hasColumn('traffic_events', 'extraordinary')) {
                $table->dropColumn('extraordinary');
            }
        });
    }
};
