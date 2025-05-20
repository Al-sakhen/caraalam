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
        Schema::create('car_country_history_category', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('car_id')->index();
            $table->unsignedBigInteger('country_id')->index();
            $table->unsignedBigInteger('history_category_id')->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('car_country_history_category');
    }
};
