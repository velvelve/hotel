<?php

namespace Tests\Feature\migrations;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class ImageServiceMigrationTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        // Проверяем, что таблица "image_service" была создана
        $this->assertTrue(Schema::hasTable('image_service'));

        // Проверяем столбцы таблицы "image_service"
        $this->assertTrue(Schema::hasColumns('image_service', [
            'id',
            'service_id',
            'image_id',
            'is_icon',
            'created_at',
            'updated_at',
        ]));
    }
}
