<?php

namespace Tests\Feature\migrations;

use App\Models\Hotel;
use App\Models\Review;
use App\Models\User;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class ReviewMigrationTest extends TestCase
{
    public function test_example(): void
    {
        // Проверяем, что таблица "reviews" была создана
        $this->assertTrue(Schema::hasTable('reviews'));

        // Проверяем столбцы таблицы "reviews"
        $this->assertTrue(Schema::hasColumns('reviews', [
            'id',
            'user_id',
            'hotel_id',
            'comment',
            'rating',
            'created_at',
            'updated_at',
        ]));
    }

    public function testReviewHasUser()
    {
        $review = Review::find(1);

        // Проверяем, что у отзыва есть кто оставил отзыв
        $this->assertInstanceOf(User::class, $review->user);
    }

    public function testReviewHasHotel()
    {
        $review = Review::find(1);

        // Проверяем, что у отзыва есть отель о ком отзыв
        $this->assertInstanceOf(Hotel::class, $review->hotel);
    }
}
