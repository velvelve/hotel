<?php

namespace Database\Seeders;

use App\Models\Review;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
                "id" => 1,
                "user_id" => 1,
                "hotel_id" => 1,
                'comment' => 'Прекрасный отель с удобными номерами и великолепным обслуживанием.',
                "rating" => 5,
            ),
            array(
                "id" => 2,
                "user_id" => 2,
                "hotel_id" => 1,
                'comment' => 'Отель имеет отличное расположение, рядом со всеми основными достопримечательностями.',
                "rating" => 3,
            ),
            array(
                "id" => 3,
                "user_id" => 3,
                "hotel_id" => 1,
                'comment' => 'У нас был великолепный вид из нашего номера на море и закаты.',
                "rating" => 3,
            ),
            array(
                "id" => 4,
                "user_id" => 4,
                "hotel_id" => 1,
                'comment' => 'Завтрак был разнообразным и вкусным, с большим выбором блюд.',
                "rating" => 3,
            ),
            array(
                "id" => 5,
                "user_id" => 5,
                "hotel_id" => 1,
                'comment' => 'Отель был очень чистым и ухоженным, с современным дизайном интерьера.',
                "rating" => 4,
            ),
            array(
                "id" => 6,
                "user_id" => 6,
                "hotel_id" => 1,
                'comment' => 'Бассейн и спа-центр были превосходными, идеально подходят для релаксации и отдыха.',
                "rating" => 5,
            ),
            array(
                "id" => 7,
                "user_id" => 7,
                "hotel_id" => 1,
                'comment' => 'Wi-Fi был быстрым и надежным, что было очень удобно для работы и связи.',
                "rating" => 4,
            ),
            array(
                "id" => 8,
                "user_id" => 8,
                "hotel_id" => 1,
                'comment' => 'Ресторан отеля предлагал великолепные блюда высокого качества.',
                "rating" => 4,
            ),
            array(
                "id" => 9,
                "user_id" => 9,
                "hotel_id" => 1,
                'comment' => 'Мы получили превосходное обслуживание и чувствовали себя как дома в этом отеле.',
                "rating" => 4,
            ),
        ]);
    }
}
