<?php

namespace Tests\Feature\migrations;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class PhoneMigrationTest extends TestCase
{
    public function test_example(): void
    {
        // Проверяем, что таблица "phones" была создана
        $this->assertTrue(Schema::hasTable('phones'));

        // Проверяем столбцы таблицы "phones"
        $this->assertTrue(Schema::hasColumns('phones', [
            'id',
            'hotel_id',
            'number',
            'created_at',
            'updated_at',
        ]));
    }
}
