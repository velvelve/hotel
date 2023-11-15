<?php

namespace Tests\Feature\migrations;

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
}
