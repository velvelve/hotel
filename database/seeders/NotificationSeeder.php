<?php

namespace Database\Seeders;

use App\Models\NotificationPreference;
use Illuminate\Database\Seeder;

class NotificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        NotificationPreference::create([
            'discounts' => false,
            'special_offers' => false,
            'bonus_earnings' => false,
            'feedback_responses' => false,
        ]);
        NotificationPreference::create([
            'discounts' => true,
            'special_offers' => true,
            'bonus_earnings' => false,
            'feedback_responses' => true,
        ]);
    }
}
