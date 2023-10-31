<?php

namespace Tests\Feature\migrations;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class RoomPaymentMigrationTest extends TestCase
{
    public function test_example(): void
    {
        // Проверяем, что таблица "rooms" была создана
        $this->assertTrue(Schema::hasTable('rooms'));

        // Проверяем столбцы таблицы "rooms"
        $this->assertTrue(Schema::hasColumns('rooms', [
            'id',
            'hotel_id',
            'description',
            'area',
            'apartment_count',
            'adults_max_guests',
            'children_max_guests',
            'price',
            'availability',
            'room_type_id',
            'view_type_id',
            'bed_type_id',
            'created_at',
            'updated_at',
        ]));
    }
}
