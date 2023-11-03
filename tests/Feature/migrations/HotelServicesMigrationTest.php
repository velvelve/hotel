<?php

namespace Tests\Feature\migrations;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class HotelServicesMigrationTest extends TestCase
{
    public function test_example(): void
    {
        // Проверяем, что таблица "hotel_service" была создана
        $this->assertTrue(Schema::hasTable('hotel_service'));

        // Проверяем столбцы таблицы "hotel_service"
        $this->assertTrue(Schema::hasColumns('hotel_service', [
            'hotel_id',
            'service_id',
            'created_at',
            'updated_at',
        ]));
    }
}
