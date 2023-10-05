<?php

namespace Database\Seeders;

use App\Models\Room;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
//        Room::factory()->count(20)->create();
        Room::factory()->createMany([
            array(
                "id" => 20,
                "hotel_id" => 1,
                "room_number" => "108",
                "room_type" => "стандарт",
                "price" => 1200.23,
                "availability" => "false",
                "max_guest_count" => 4,
            ),
            array(
                "id" => 19,
                "hotel_id" => 1,
                "room_number" => "107",
                "room_type" => "эконом",
                "price" => 683.79,
                "availability" => "true",
                "max_guest_count" => 4,
            ),
            array(
                "id" => 18,
                "hotel_id" => 1,
                "room_number" => "112",
                "room_type" => "полулюкс",
                "price" => 5511.84,
                "availability" => "false",
                "max_guest_count" => 2,
            ),
            array(
                "id" => 17,
                "hotel_id" => 1,
                "room_number" => "120",
                "room_type" => "полулюкс",
                "price" => 5511.84,
                "availability" => "true",
                "max_guest_count" => 2,
            ),
            array(
                "id" => 16,
                "hotel_id" => 1,
                "room_number" => "103",
                "room_type" => "эконом",
                "price" => 683.79,
                "availability" => "false",
                "max_guest_count" => 1,
            ),
            array(
                "id" => 15,
                "hotel_id" => 1,
                "room_number" => "118",
                "room_type" => "люкс",
                "price" => 9370.87,
                "availability" => "false",
                "max_guest_count" => 2,
            ),
            array(
                "id" => 14,
                "hotel_id" => 1,
                "room_number" => "117",
                "room_type" => "полулюкс",
                "price" => 5511.84,
                "availability" => "true",
                "max_guest_count" => 3,
            ),
            array(
                "id" => 13,
                "hotel_id" => 1,
                "room_number" => "111",
                "room_type" => "полулюкс",
                "price" => 5511.84,
                "availability" => "true",
                "max_guest_count" => 2,
            ),
            array(
                "id" => 12,
                "hotel_id" => 1,
                "room_number" => "102",
                "room_type" => "люкс",
                "price" => 9370.87,
                "availability" => "true",
                "max_guest_count" => 4,
            ),
            array(
                "id" => 11,
                "hotel_id" => 1,
                "room_number" => "110",
                "room_type" => "полулюкс",
                "price" => 5511.84,
                "availability" => "true",
                "max_guest_count" => 1,
            ),
            array(
                "id" => 10,
                "hotel_id" => 1,
                "room_number" => "119",
                "room_type" => "стандарт улучшенный",
                "price" => 748.95,
                "availability" => "true",
                "max_guest_count" => 1,
            ),
            array(
                "id" => 9,
                "hotel_id" => 1,
                "room_number" => "113",
                "room_type" => "люкс",
                "price" => 9370.87,
                "availability" => "true",
                "max_guest_count" => 1,
            ),
            array(
                "id" => 8,
                "hotel_id" => 1,
                "room_number" => "100",
                "room_type" => "эконом",
                "price" => 683.79,
                "availability" => "true",
                "max_guest_count" => 3,
            ),
            array(
                "id" => 7,
                "hotel_id" => 1,
                "room_number" => "115",
                "room_type" => "люкс",
                "price" => 9370.87,
                "availability" => "true",
                "max_guest_count" => 2,
            ),
            array(
                "id" => 6,
                "hotel_id" => 1,
                "room_number" => "114",
                "room_type" => "люкс",
                "price" => 9370.87,
                "availability" => "false",
                "max_guest_count" => 2,
            ),
            array(
                "id" => 5,
                "hotel_id" => 1,
                "room_number" => "116",
                "room_type" => "полулюкс",
                "price" => 5511.84,
                "availability" => "true",
                "max_guest_count" => 4,
            ),
            array(
                "id" => 4,
                "hotel_id" => 1,
                "room_number" => "105",
                "room_type" => "люкс",
                "price" => 9370.87,
                "availability" => "false",
                "max_guest_count" => 3,
            ),
            array(
                "id" => 3,
                "hotel_id" => 1,
                "room_number" => "106",
                "room_type" => "стандарт улучшенный",
                "price" => 4840.13,
                "availability" => "true",
                "max_guest_count" => 4,
            ),
            array(
                "id" => 2,
                "hotel_id" => 1,
                "room_number" => "101",
                "room_type" => "эконом",
                "price" => 683.79,
                "availability" => "false",
                "max_guest_count" => 2,
            ),
            array(
                "id" => 1,
                "hotel_id" => 1,
                "room_number" => "104",
                "room_type" => "люкс",
                "price" => 9370.87,
                "availability" => "true",
                "max_guest_count" => 1,
            ),
        ]);
    }
}
