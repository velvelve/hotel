<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class UserMigrationTest extends TestCase
{
    public function testItCreatesUsersTable()
    {
        // Проверяем, что таблица "users" была создана
        $this->assertTrue(Schema::hasTable('users'));

        // Проверяем, что таблица "users" содержит необходимые столбцы
        $this->assertTrue(Schema::hasColumns('users', [
            'id',
            'first_name',
            'last_name',
            'email',
            'email_verified_at',
            'password',
            'remember_token',
            'created_at',
            'updated_at',
        ]));
    }
}
