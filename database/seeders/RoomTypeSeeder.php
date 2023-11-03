<?php

namespace Database\Seeders;

use App\Enums\Rooms\RoomsTypes;
use App\Enums\Rooms\RoomTypes;
use App\Models\RoomType;
use Illuminate\Database\Seeder;

class RoomTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roomTypes = RoomTypes::getRoomTypeObjects();
        foreach ($roomTypes as $roomType) {
            $constant = strtoupper($roomType->name);
            RoomType::create([
                'name' => $roomType->name,
                'description' => $roomType->description,
                'constant' => $constant,
            ]);
        }
    }
}
