<?php

namespace Tests\Feature\migrations;

use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class DedTypeMigrationTest extends TestCase
{
    public function test_example(): void
    {
        // Проверяем, что таблица "bed_types" была создана
        $this->assertTrue(Schema::hasTable('bed_types'));

        // Проверяем столбцы таблицы "bed_types"
        $this->assertTrue(Schema::hasColumns('bed_types', [
            'id',
            'description',
            'constant',
            'created_at',
            'updated_at',
        ]));
    }
}
