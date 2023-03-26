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
        Schema::create('forecast_solar', function (Blueprint $table) {
            $table->id();
            $table->dateTime('forecast_at');
            $table->dateTime('forecast_for');
            $table->integer('watthours');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('forecast_solar');
    }
};
