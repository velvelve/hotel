<?php

namespace Tests\Feature\migrations;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class HotelMigrationTest extends TestCase
{
    public function test_example(): void
    {
        // Проверяем, что таблица "hotels" была создана
        $this->assertTrue(Schema::hasTable('hotels'));

        // Проверяем столбцы таблицы "hotels"
        $this->assertTrue(Schema::hasColumns('hotels', [
            'id',
            'name',
            'location_id',
            'created_at',
            'updated_at',
        ]));
    }
}
