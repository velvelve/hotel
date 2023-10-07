<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        User::factory()->createMany([
            array(
                "id" => 3,
                "first_name" => "Алексей",
                "last_name" => "Петров",
                "email" => "vosinski@example.com",
            ),
            array(
                "id" => 2,
                "first_name" => "Иван",
                "last_name" => "Калашников",
                "email" => "huel.justine@example.org",
            ),
            array(
                "id" => 1,
                "first_name" => "Сергей",
                "last_name" => "Мишарин",
                "email" => "ryann14@example.com",
            ),
            array(
                "id" => 5,
                "first_name" => "Мария",
                "last_name" => "Иванова",
                "email" => "sandra93@example.com",
            ),
            array(
                "id" => 7,
                "first_name" => "Ольга",
                "last_name" => "Козлова",
                "email" => "shanie33@example.org",
            ),
            array(
                "id" => 4,
                "first_name" => "Елена",
                "last_name" => "Сидорова",
                "email" => "antwon.klocko@example.com",
            ),
            array(
                "id" => 9,
                "first_name" => "Наталья",
                "last_name" => "Павлова",
                "email" => "tremayne.schroeder@example.com",
            ),
            array(
                "id" => 10,
                "first_name" => "Дмитрий",
                "last_name" => "Егоров",
                "email" => "mccullough.salvatore@example.org",
            ),
            array(
                "id" => 8,
                "first_name" => "Александр",
                "last_name" => "Васильев",
                "email" => "carmen.stehr@example.net",
            ),
            array(
                "id" => 6,
                "first_name" => "Андрей",
                "last_name" => "Смирнов",
                "email" => "kuhn.dax@example.net",
            ),
        ]);
    }
}
