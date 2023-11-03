<?php

namespace Tests\Feature\migrations;

use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class RoomTypeMigrationTest extends TestCase
{
    public function test_example(): void
    {
        // Проверяем, что таблица "room_types" была создана
        $this->assertTrue(Schema::hasTable('room_types'));

        // Проверяем столбцы таблицы "room_types"
        $this->assertTrue(Schema::hasColumns('room_types', [
            'id',
            'name',
            'description',
            'constant',
            'created_at',
            'updated_at',
        ]));
    }
}
