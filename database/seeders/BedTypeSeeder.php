<?php

namespace Database\Seeders;

use App\Enums\Rooms\BedTypes;
use App\Models\BedType;
use Illuminate\Database\Seeder;

class BedTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $bedTypes = BedTypes::getBedTypeObjects();
        foreach ($bedTypes as $bedType) {
            BedType::create([
                'constant' => $bedType->constant,
                'description' => $bedType->description,
            ]);
        }
    }
}
