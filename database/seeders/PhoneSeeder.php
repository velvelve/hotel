<?php

namespace Database\Seeders;

use App\Models\Phone;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
                "id" => 1,
                "hotel_id" => 1,
                "number" => "+78373159813",
            ),
            array(
                "id" => 2,
                "hotel_id" => 1,
                "number" => "+75188206448",
            ),
            array(
                "id" => 3,
                "hotel_id" => 1,
                "number" => "+74051437056",
            ),
        ]);
    }
}
