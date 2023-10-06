<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Таблица для хранения информации о бронированиях номеров в отеле,
     * включая даты заезда и выезда, количество гостей,
     * статус бронирования и связанные данные.
     */
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('room_id');
            $table->unsignedBigInteger('user_id');
            $table->date('check_in_date');
            $table->date('check_out_date');
            $table->integer('guests_count');
            $table->enum('status', ['забронировано', 'подтверждено', 'отменено'])->default('забронировано');
            $table->timestamps();

            $table->foreign('room_id')->references('id')->on('rooms')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
