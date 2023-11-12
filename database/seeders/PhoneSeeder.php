<?php

namespace Database\Seeders;

use App\Enums\Hotels\PhoneType;
use App\Models\Phone;
use Illuminate\Database\Seeder;

class PhoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Phone::factory()->createMany([
            array(
                "hotel_id" => 1,
                "number" => "+78373159813",
                'type' => PhoneType::MAIN,
            ),
            array(
                "hotel_id" => 1,
                "number" => "+75188206448",
                'type' => PhoneType::BOOKING,
            ),
            array(
                "hotel_id" => 1,
                "number" => "+74051437056",
                'type' => PhoneType::RECEPTION,
            ),
            array(
                "hotel_id" => 1,
                "number" => "+74051432346",
                'type' => PhoneType::SALES,
            ),
        ]);
    }
}
