<?php

namespace Tests\Feature\migrations;

use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class ReviewMigrationTest extends TestCase
{
    public function test_example(): void
    {
        // Проверяем, что таблица "reviews" была создана
        $this->assertTrue(Schema::hasTable('reviews'));

        // Проверяем столбцы таблицы "reviews"
        $this->assertTrue(Schema::hasColumns('reviews', [
            'id',
            'user_id',
            'hotel_id',
            'comment',
            'rating',
            'created_at',
            'updated_at',
        ]));
    }
}
