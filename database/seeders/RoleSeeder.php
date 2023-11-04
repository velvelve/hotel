<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create([
            'name' => 'Пользолватель',
            'constant' => Role::$USER_ROLE_CONST,
        ]);
        Role::create([
            'name' => 'Сотрудник',
            'constant' => Role::$EMPLOYEE_ROLE_CONST,
        ]);
        Role::create([
            'name' => 'Администратор',
            'constant' => Role::$ADMIN_ROLE_CONST,
        ]);
    }
}
