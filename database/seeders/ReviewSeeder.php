<?php

namespace Database\Seeders;

use App\Models\Review;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Review::factory()->createMany([
            array(
                'user_id' => 1,
                'hotel_id' => 1,
                'comment' => 'Прекрасный отель с удобными номерами и великолепным обслуживанием.',
                'rating' => 5,
            ),
            array(
                'user_id' => 1,
                'hotel_id' => 1,
                'comment' => 'Отель имеет отличное расположение, рядом со всеми основными достопримечательностями.',
                'rating' => 4,
            ),
            array(
                'user_id' => 1,
                'hotel_id' => 1,
                'comment' => 'Завтрак был разнообразным и вкусным, с большим выбором блюд.',
                'rating' => 4,
            ),
        ]);
    }
}
