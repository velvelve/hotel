<?php

use App\Enums\Rooms\RoomsTypes;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
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
            $table->string('room_number');
            $table->string('description');
            $table->unsignedInteger('area');
            $table->unsignedInteger('apartment_count');
            $table->unsignedTinyInteger('adults_max_guests')->default(1);
            $table->unsignedTinyInteger('children_max_guests')->default(0);
            $table->decimal('price', 8, 2);
            $table->boolean('availability')->default(true);
            $table->unsignedBigInteger('room_type_id');
            $table->unsignedBigInteger('view_type_id');
            $table->unsignedBigInteger('bed_type_id');
            $table->timestamps();

            $table->foreign('hotel_id')->references('id')->on('hotels')->onDelete('cascade');
            $table->foreign('room_type_id')->references('id')->on('room_types')->onDelete('cascade');
            $table->foreign('view_type_id')->references('id')->on('view_types')->onDelete('cascade');
            $table->foreign('bed_type_id')->references('id')->on('bed_types')->onDelete('cascade');
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
