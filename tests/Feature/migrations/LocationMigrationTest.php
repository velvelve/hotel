<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class LocationMigrationTest extends TestCase
{
    public function test_example(): void
    {
        // Проверяем, что таблица "locations" была создана
        $this->assertTrue(Schema::hasTable('locations'));

        // Проверяем столбцы таблицы "locations"
        $this->assertTrue(Schema::hasColumns('locations', [
            'id',
            'country',
            'city',
            'street',
            'house',
            'created_at',
            'updated_at',
        ]));
    }
}
