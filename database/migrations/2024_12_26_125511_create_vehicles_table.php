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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('registration_number', 10);
            $table->string('model', 50);
            $table->string('brand', 50);
            $table->year('year');
            $table->string('vin', 17);
            $table->integer('engine_capacity')->default(0);
            $table->integer('mileage')->default(0);

            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('fuel_type_id');
            $table->unsignedBigInteger('status_id');
            $table->unsignedBigInteger('body_type_id');
            $table->unsignedBigInteger('user_id');

            $table->foreign('category_id')->references('id')->on('vehicle_categories')->onDelete('RESTRICT');
            $table->foreign('fuel_type_id')->references('id')->on('fuel_types')->onDelete('RESTRICT');
            $table->foreign('status_id')->references('id')->on('vehicle_statuses')->onDelete('RESTRICT');
            $table->foreign('body_type_id')->references('id')->on('body_types')->onDelete('RESTRICT');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('RESTRICT');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
