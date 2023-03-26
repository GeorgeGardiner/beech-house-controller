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
        Schema::create('solax_inverter_reading', function (Blueprint $table) {
            $table->id();
            $table->dateTime('reading_at');
            $table->integer('acpower_w');
            $table->integer('yieldtoday_wh');
            $table->integer('yieldtotal_wh');
            $table->integer('feedinpower_w');
            $table->integer('feedinenergy_w');
            $table->integer('consumeenergy_wh');
            $table->integer('feedinpowerm2_w');
            $table->integer('soc_pct');
            $table->integer('peps1_w');
            // $table->integer('peps2_w');
            // $table->integer('peps3_w');
            $table->integer('inverter_status');
        });

        Schema::create('solax_force_charge', function (Blueprint $table) {
            $table->id();
            $table->date('applicable_at');
            $table->integer('charge_to');
        });

    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('solax_inverter_reading');
    }
};
