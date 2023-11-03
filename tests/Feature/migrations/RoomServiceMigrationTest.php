<?php

namespace Tests\Feature\migrations;

use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class RoomServiceMigrationTest extends TestCase
{
    public function test_example(): void
    {
        // Проверяем, что таблица "room_service" была создана
        $this->assertTrue(Schema::hasTable('room_service'));

        // Проверяем столбцы таблицы "room_service"
        $this->assertTrue(Schema::hasColumns('room_service', [
            'room_id',
            'service_id',
            'additional',
            'created_at',
            'updated_at',
        ]));
    }
}
