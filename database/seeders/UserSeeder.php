<?php

namespace Database\Seeders;

use App\Enums\Users\Gender;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'first_name' => 'admin',
            'middle_name' => 'admin',
            'last_name' => 'admin',
            'email' => 'admin@admin.com',
            'phone' => '+79271234567',
            'country' => 'Россия',
            'city' => 'Москва',
            'date_of_birth' => '1990-01-01',
            'gender' => Gender::MAN,
            'email_verified_at' => now(),
            'password' => Hash::make('admin'),
            'notification_preference_id' => 1,
            'role_id' => 3,
        ]);
        User::create([
            'first_name' => 'worker',
            'middle_name' => 'worker',
            'last_name' => 'worker',
            'email' => 'worker@worker.com',
            'phone' => '+79272345678',
            'country' => 'Россия',
            'city' => 'Москва',
            'date_of_birth' => '1990-01-01',
            'gender' => Gender::MAN,
            'email_verified_at' => now(),
            'password' => Hash::make('worker'),
            'notification_preference_id' => 2,
            'role_id' => 2,
        ]);
    }
}
