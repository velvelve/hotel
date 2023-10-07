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
        Schema::create('room_payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('room_id');
            $table->string('card_number');
            $table->string('card_expiry');
            $table->string('card_cvc');
            $table->string('card_owner_name');
            $table->string('email')->nullable();
            $table->decimal('amount',8,2);
            $table->boolean('is_receipt_sent')->default(false);

            $table->foreign('room_id')->references('id')->on('rooms')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('room_payments');
    }
};
