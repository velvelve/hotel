<?php

namespace Database\Seeders;

use App\Enums\Users\Gender;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
            'first_name' => 'Алексей',
            'middle_name' => 'Иванович',
            'last_name' => 'Петров',
            'email' => 'test@test.com',
            'phone' => '+79271234567',
            'country' => 'Россия',
            'city' => 'Москва',
            'date_of_birth' => '1990-01-01',
            'gender' => Gender::MAN,
            'email_verified_at' => now(),
            'password' => Hash::make('123456789'),
            'notification_id' => 1,
        ]);
    }
}
