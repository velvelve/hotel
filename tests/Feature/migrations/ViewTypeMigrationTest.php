<?php

namespace Tests\Feature\migrations;

use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class ViewTypeMigrationTest extends TestCase
{
    public function test_example(): void
    {
        // Проверяем, что таблица "view_types" была создана
        $this->assertTrue(Schema::hasTable('view_types'));

        // Проверяем столбцы таблицы "view_types"
        $this->assertTrue(Schema::hasColumns('view_types', [
            'id',
            'description',
            'constant',
            'created_at',
            'updated_at',
        ]));
    }
}
