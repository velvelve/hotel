<?php

namespace Tests\Feature\migrations;

use App\Models\Booking;
use App\Models\BookingService;
use App\Models\Service;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class BookingServiceMigrationTest extends TestCase
{
    public function test_example(): void
    {
        // Проверяем, что таблица "booking_service" была создана
        $this->assertTrue(Schema::hasTable('booking_service'));

        // Проверяем столбцы таблицы "booking_service"
        $this->assertTrue(Schema::hasColumns('booking_service', [
            'booking_id',
            'service_id',
            'created_at',
            'updated_at',
        ]));
    }
}
