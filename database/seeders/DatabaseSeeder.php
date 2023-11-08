<?php

namespace Database\Seeders;

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
        DB::table('notification_preferences')->truncate(); // admin
        DB::table('roles')->truncate(); // наверное в админке не должно быть
        DB::table('view_types')->truncate(); // admin
        DB::table('bed_types')->truncate(); // admin
        DB::table('room_types')->truncate(); // admin
        DB::table('images')->truncate(); // admin
        DB::table('bookings')->truncate(); // admin
        DB::table('image_service')->truncate();
        DB::table('hotel_service')->truncate();
        DB::table('room_service')->truncate();
        DB::table('booking_service')->truncate();
        DB::table('services')->truncate(); // admin
        DB::table('rooms')->truncate();
        DB::table('reviews')->truncate();
        DB::table('users')->truncate();
        DB::table('phones')->truncate();
        DB::table('hotels')->truncate();
        DB::table('locations')->truncate(); // admin
        DB::table('cities')->truncate(); // admin
        DB::table('countries')->truncate(); // admin


        $this->call([
            NotificationSeeder::class,
            RoleSeeder::class,
            LocationSeeder::class,
            HotelSeeder::class,
            PhoneSeeder::class,
            UserSeeder::class,
            ReviewSeeder::class,
            RoomTypeSeeder::class,
            BedTypeSeeder::class,
            ViewTypeSeeder::class,
            RoomSeeder::class,
            BookingSeeder::class,
            ImageSeeder::class,
            ServiceSeeder::class,
        ]);
    }
}
