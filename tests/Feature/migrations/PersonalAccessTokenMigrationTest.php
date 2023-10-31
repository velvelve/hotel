<?php

namespace Tests\Feature\migrations;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class PersonalAccessTokenMigrationTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        // Проверяем, что таблица "personal_access_tokens" была создана
        $this->assertTrue(Schema::hasTable('personal_access_tokens'));

        // Проверяем столбцы таблицы "personal_access_tokens"
        $this->assertTrue(Schema::hasColumns('personal_access_tokens', [
            'id',
            'tokenable_type',
            'tokenable_id',
            'name',
            'token',
            'abilities',
            'last_used_at',
            'expires_at',
            'created_at',
            'updated_at',
        ]));
    }
}
