<?php

namespace Tests\Feature\migrations;

use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class ServiceMigrationTest extends TestCase
{
    public function test_example(): void
    {
        // Проверяем, что таблица "services" была создана
        $this->assertTrue(Schema::hasTable('services'));

        // Проверяем столбцы таблицы "services"
        $this->assertTrue(Schema::hasColumns('services', [
            'id',
            'name',
            'full_description',
            'price',
            'constant',
            'created_at',
            'updated_at',
        ]));
    }
}
