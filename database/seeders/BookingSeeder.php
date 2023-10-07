<?php

namespace Database\Seeders;

use App\Models\Booking;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Booking::factory()->createMany([

            array(
                "id" => 14,
                "room_id" => 4,
                "user_id" => 6,
                "check_in_date" => "2023-10-03",
                "check_out_date" => "2023-10-24",
                "guests_count" => 3,
                "status" => "отменено",
            ),
            array(
                "id" => 15,
                "room_id" => 2,
                "user_id" => 1,
                "check_in_date" => "2023-10-03",
                "check_out_date" => "1986-12-20",
                "guests_count" => 3,
                "status" => "отменено",
            ),
            array(
                "id" => 16,
                "room_id" => 5,
                "user_id" => 6,
                "check_in_date" => "2023-10-09",
                "check_out_date" => "2023-10-020",
                "guests_count" => 4,
                "status" => "подтверждено",
            ),
            array(
                "id" => 17,
                "room_id" => 10,
                "user_id" => 1,
                "check_in_date" => "2023-10-01",
                "check_out_date" => "2023-10-03",
                "guests_count" => 4,
                "status" => "забронировано",
            ),
            array(
                "id" => 18,
                "room_id" => 1,
                "user_id" => 1,
                "check_in_date" => "2023-10-11",
                "check_out_date" => "2003-11-12",
                "guests_count" => 1,
                "status" => "подтверждено",
            ),
            array(
                "id" => 19,
                "room_id" => 9,
                "user_id" => 9,
                "check_in_date" => "2023-10-05",
                "check_out_date" => "2012-10-10",
                "guests_count" => 3,
                "status" => "забронировано",
            ),
            array(
                "id" => 20,
                "room_id" => 3,
                "user_id" => 8,
                "check_in_date" => "2023-10-01",
                "check_out_date" => "2023-10-20",
                "guests_count" => 2,
                "status" => "подтверждено",
            ),
            array(
                "id" => 21,
                "room_id" => 8,
                "user_id" => 7,
                "check_in_date" => "2023-10-01",
                "check_out_date" => "2023-10-07",
                "guests_count" => 2,
                "status" => "забронировано",
            ),
            array(
                "id" => 22,
                "room_id" => 7,
                "user_id" => 3,
                "check_in_date" => "2023-10-01",
                "check_out_date" => "2023-10-07",
                "guests_count" => 1,
                "status" => "подтверждено",
            ),
            array(
                "id" => 23,
                "room_id" => 6,
                "user_id" => 5,
                "check_in_date" => "2023-09-24",
                "check_out_date" => "2023-09-30",
                "guests_count" => 2,
                "status" => "подтверждено",
            ),
        ]);
    }
}
