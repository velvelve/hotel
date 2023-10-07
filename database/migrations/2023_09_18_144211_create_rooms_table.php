<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Таблица для хранения информации о номерах в отеле,
     * таких как номер комнаты, тип номера,
     * стоимость и доступность.
     */
    public function up(): void
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('hotel_id');
            $table->string('room_number'); // Обсудить тип!!!
            $table->enum('room_type', ['эконом', 'стандарт', 'стандарт улучшенный', 'полулюкс', 'люкс']);  // Обсудить!!!
            $table->decimal('price', 8, 2);
            $table->boolean('availability')->default(true);
            $table->timestamps();

            $table->foreign('hotel_id')->references('id')->on('hotels')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
