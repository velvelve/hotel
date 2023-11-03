<?php

namespace Database\Seeders;

use App\Models\Notification;
use Illuminate\Database\Seeder;

class NotificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Notification::create([
            'discounts' => true,
            'special_offers' => true,
            'bonus_earnings' => false,
            'feedback_responses' => true,
        ]);
    }
}
