<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Таблица для хранения информации о дополнительных услугах,
     * предоставляемых в отеле, таких как прачечная,
     * парковка, тренажерный зал и т.д.
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('full_description');
            $table->decimal('price', 8, 2);
            $table->string('constant');
            $table->timestamps();
        });

        Schema::create('booking_service', function (Blueprint $table) {
            $table->unsignedBigInteger('booking_id');
            $table->unsignedBigInteger('service_id');
            $table->timestamps();

            $table->foreign('booking_id')->references('id')->on('bookings')->onDelete('cascade');
            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');
        });

        Schema::create('hotel_service', function (Blueprint $table) {
            $table->unsignedBigInteger('hotel_id');
            $table->unsignedBigInteger('service_id');
            $table->timestamps();

            $table->foreign('hotel_id')->references('id')->on('hotels')->onDelete('cascade');
            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');
        });

        Schema::create('room_service', function (Blueprint $table) {
            $table->unsignedBigInteger('room_id');
            $table->unsignedBigInteger('service_id');
            $table->boolean('additional')->default(false);
            $table->timestamps();

            $table->foreign('room_id')->references('id')->on('rooms')->onDelete('cascade');
            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');
        });

        Schema::create('image_service', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('service_id');
            $table->unsignedBigInteger('image_id');
            $table->boolean('is_icon')->default(false);
            $table->timestamps();

            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');
            $table->foreign('image_id')->references('id')->on('images')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('booking_service');
        Schema::dropIfExists('room_service');
        Schema::dropIfExists('hotel_service');
        Schema::dropIfExists('image_service');
        Schema::dropIfExists('services');
    }
};
