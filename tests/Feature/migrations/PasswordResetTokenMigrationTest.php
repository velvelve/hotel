<?php

namespace Tests\Feature\migrations;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class PasswordResetTokenMigrationTest extends TestCase
{
    public function test_example(): void
    {
        // Проверяем, что таблица "password_reset_tokens" была создана
        $this->assertTrue(Schema::hasTable('password_reset_tokens'));

        // Проверяем столбцы таблицы "password_reset_tokens"
        $this->assertTrue(Schema::hasColumns('password_reset_tokens', [
            'email',
            'token',
            'created_at',
        ]));
    }
}
