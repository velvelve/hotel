<?php

namespace Tests\Feature\migrations;

use App\Models\Booking;
use App\Models\Room;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class BookingMigrationTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        // Проверяем, что таблица "users" была создана
        $this->assertTrue(Schema::hasTable('bookings'));

        // Проверяем столбцы таблицы "users"
        $this->assertTrue(Schema::hasColumns('bookings', [
            'id',
            'room_id',
            'user_id',
            'check_in_date',
            'check_out_date',
            'client_first_name',
            'client_last_name',
            'client_middle_name',
            'client_phone',
            'client_email',
            'promo_code',
            'client_wishes',
            'guests_count',
            'status',
            'total_price',
            'created_at',
            'updated_at',
        ]));
    }

    public function testBookingHasRoom()
    {
        $booking = Booking::find(1);

        // Проверяем, что у брони есть с комнатой
        $this->assertInstanceOf(Room::class, $booking->room);
    }

    public function testBookingHasUser()
    {
        $booking = Booking::find(1);

        // Проверяем, что у брони есть с комнатой
        $this->assertInstanceOf(User::class, $booking->user);
    }
}
