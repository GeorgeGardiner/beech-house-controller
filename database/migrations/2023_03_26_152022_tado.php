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
        Schema::create('tado_zone_state', function (Blueprint $table) {
            $table->id();
            $table->dateTime('reading_at');
            $table->integer('zone_id');
            $table->double('temperature', 5, 2)->nullable();
            $table->integer('humidity')->nullable();
            $table->double('target_temperature', 5, 2)->nullable();
            $table->integer('heating_power')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('tado_zone_state');
    }
};
