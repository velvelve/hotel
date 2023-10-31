<?php

namespace Tests\Feature\migrations;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class ImageMigrationTest extends TestCase
{
    public function test_example(): void
    {
        // Проверяем, что таблица "images" была создана
        $this->assertTrue(Schema::hasTable('images'));

        // Проверяем столбцы таблицы "images"
        $this->assertTrue(Schema::hasColumns('images', [
            'id',
            'hotel_id',
            'room_id',
            'filename',
            'path',
            'created_at',
            'updated_at',
        ]));
    }
}
