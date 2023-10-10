<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // Truncate tables
        DB::table('images')->truncate();
        DB::table('bookings')->truncate();
        DB::table('services')->truncate();
        DB::table('rooms')->truncate();
        DB::table('reviews')->truncate();
        DB::table('users')->truncate();
        DB::table('phones')->truncate();
        DB::table('hotels')->truncate();
        DB::table('locations')->truncate();


        $this->call([
            LocationSeeder::class,
            HotelSeeder::class,
            PhoneSeeder::class,
            UserSeeder::class,
            ReviewSeeder::class,
            RoomSeeder::class,
            ServiceSeeder::class,
            BookingSeeder::class,
            ImageSeeder::class,
        ]);
    }
}
