<?php

namespace Database\Seeders;

use App\Enums\Rooms\ViewTypes;
use App\Models\ViewType;
use Illuminate\Database\Seeder;

class ViewTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $viewTypes = ViewTypes::getViewTypeObjects();
        foreach ($viewTypes as $viewType) {
            ViewType::create([
                'constant' => $viewType->constant,
                'description' => $viewType->description,
            ]);
        }
    }
}
