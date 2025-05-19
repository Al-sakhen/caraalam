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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('name_en')->nullable();
            $table->string('name_ar')->nullable();
            $table->longText('chassis_number')->nullable();
            $table->unsignedInteger('rating')->default(0);
            $table->string('engine_capacity')->nullable();
            $table->string('color')->nullable();
            $table->string('country')->nullable();
            $table->decimal('height', 8, 2)->nullable();
            $table->decimal('width', 8, 2)->nullable();
            $table->decimal('length', 8, 2)->nullable();
            $table->unsignedInteger('seats')->nullable();
            $table->string('manufacturer')->nullable(); // الصانع
            $table->string('made_in')->nullable();
            $table->string('model')->nullable(); // الموديل
            $table->string('car_class')->nullable(); // فئة السيارة
            $table->string('engine')->nullable();
            $table->string('steering_mode')->nullable();
            $table->string('anti_lock_brake_system')->nullable();
            $table->decimal('extra_urban_cnsumption', 8, 2)->nullable(); // استهلاك الووقد خارج المدينة
            $table->decimal('in_urban_cnsumption', 8, 2)->nullable(); // استهلاك الوقود في المدينة
            $table->string('registeration_status')->nullable(); // صفة التسجيل
            $table->string('used_for')->nullable(); // صفة الاستخدام
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
