<?php

namespace Database\Seeders;

use App\Enums\Rooms\RoomsTypes;
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
                "id" => 1,
                "hotel_id" => 1,
                "room_number" => "101",
                "room_type" => RoomsTypes::STANDARD,
                "price" => 1370.87,
                "availability" => "true",
                "max_guest_count" => 1,
            ),
            array(
                "id" => 2,
                "hotel_id" => 1,
                "room_number" => "102",
                "room_type" => RoomsTypes::STANDARD,
                "price" => 1683.79,
                "availability" => "false",
                "max_guest_count" => 2,
            ),
            array(
                "id" => 3,
                "hotel_id" => 1,
                "room_number" => "103",
                "room_type" => RoomsTypes::STANDARD,
                "price" => 1840.13,
                "availability" => "true",
                "max_guest_count" => 4,
            ),
            array(
                "id" => 4,
                "hotel_id" => 1,
                "room_number" => "104",
                "room_type" => RoomsTypes::STANDARD,
                "price" => 1370.87,
                "availability" => "false",
                "max_guest_count" => 3,
            ),
            array(
                "id" => 5,
                "hotel_id" => 1,
                "room_number" => "105",
                "room_type" => RoomsTypes::STANDARD,
                "price" => 1511.84,
                "availability" => "true",
                "max_guest_count" => 4,
            ),
            array(
                "id" => 6,
                "hotel_id" => 1,
                "room_number" => "201",
                "room_type" => RoomsTypes::SUPERIOR,
                "price" => 2370.87,
                "availability" => "false",
                "max_guest_count" => 2,
            ),
            array(
                "id" => 7,
                "hotel_id" => 1,
                "room_number" => "202",
                "room_type" => RoomsTypes::SUPERIOR,
                "price" => 2370.87,
                "availability" => "true",
                "max_guest_count" => 4,
            ),
            array(
                "id" => 8,
                "hotel_id" => 1,
                "room_number" => "203",
                "room_type" => RoomsTypes::SUPERIOR,
                "price" => 2683.79,
                "availability" => "true",
                "max_guest_count" => 3,
            ),
            array(
                "id" => 9,
                "hotel_id" => 1,
                "room_number" => "204",
                "room_type" => RoomsTypes::SUPERIOR,
                "price" => 2370.87,
                "availability" => "true",
                "max_guest_count" => 2,
            ),
            array(
                "id" => 10,
                "hotel_id" => 1,
                "room_number" => "205",
                "room_type" => RoomsTypes::SUPERIOR,
                "price" => 2748.95,
                "availability" => "true",
                "max_guest_count" => 1,
            ),
            array(
                "id" => 11,
                "hotel_id" => 1,
                "room_number" => "301",
                "room_type" => RoomsTypes::PREMIUM,
                "price" => 3511.84,
                "availability" => "true",
                "max_guest_count" => 2,
            ),
            array(
                "id" => 12,
                "hotel_id" => 1,
                "room_number" => "302",
                "room_type" => RoomsTypes::PREMIUM,
                "price" => 3370.87,
                "availability" => "true",
                "max_guest_count" => 4,
            ),
            array(
                "id" => 13,
                "hotel_id" => 1,
                "room_number" => "303",
                "room_type" => RoomsTypes::PREMIUM,
                "price" => 3511.84,
                "availability" => "true",
                "max_guest_count" => 5,
            ),
            array(
                "id" => 14,
                "hotel_id" => 1,
                "room_number" => "304",
                "room_type" => RoomsTypes::PREMIUM,
                "price" => 3511.84,
                "availability" => "true",
                "max_guest_count" => 3,
            ),
            array(
                "id" => 15,
                "hotel_id" => 1,
                "room_number" => "305",
                "room_type" => RoomsTypes::PREMIUM,
                "price" => 3370.87,
                "availability" => "false",
                "max_guest_count" => 2,
            ),
            array(
                "id" => 16,
                "hotel_id" => 1,
                "room_number" => "401",
                "room_type" => RoomsTypes::LUX,
                "price" => 4683.79,
                "availability" => "false",
                "max_guest_count" => 5,
            ),
            array(
                "id" => 17,
                "hotel_id" => 1,
                "room_number" => "402",
                "room_type" => RoomsTypes::LUX,
                "price" => 4511.84,
                "availability" => "true",
                "max_guest_count" => 2,
            ),
            array(
                "id" => 18,
                "hotel_id" => 1,
                "room_number" => "403",
                "room_type" => RoomsTypes::LUX,
                "price" => 4511.84,
                "availability" => "false",
                "max_guest_count" => 2,
            ),
            array(
                "id" => 19,
                "hotel_id" => 1,
                "room_number" => "404",
                "room_type" => RoomsTypes::LUX,
                "price" => 4683.79,
                "availability" => "true",
                "max_guest_count" => 4,
            ),
            array(
                "id" => 20,
                "hotel_id" => 1,
                "room_number" => "405",
                "room_type" => RoomsTypes::LUX,
                "price" => 4200.23,
                "availability" => "false",
                "max_guest_count" => 4,
            ),
            array(
                "id" => 21,
                "hotel_id" => 1,
                "room_number" => "501",
                "room_type" => RoomsTypes::FAMILY,
                "price" => 5370.87,
                "availability" => "true",
                "max_guest_count" => 4,
            ),
            array(
                "id" => 22,
                "hotel_id" => 1,
                "room_number" => "502",
                "room_type" => RoomsTypes::FAMILY,
                "price" => 5511.84,
                "availability" => "true",
                "max_guest_count" => 2,
            ),
            array(
                "id" => 23,
                "hotel_id" => 1,
                "room_number" => "503",
                "room_type" => RoomsTypes::FAMILY,
                "price" => 5372.81,
                "availability" => "true",
                "max_guest_count" => 5,
            ),
            array(
                "id" => 24,
                "hotel_id" => 1,
                "room_number" => "504",
                "room_type" => RoomsTypes::FAMILY,
                "price" => 5985.26,
                "availability" => "true",
                "max_guest_count" => 3,
            ),
            array(
                "id" => 25,
                "hotel_id" => 1,
                "room_number" => "505",
                "room_type" => RoomsTypes::FAMILY,
                "price" => 5662.55,
                "availability" => "true",
                "max_guest_count" => 5,
            ),
        ]);
    }
}
