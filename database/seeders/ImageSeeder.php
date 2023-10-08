<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roomTypes = ['standard', 'superior', 'premium', 'lux', 'royal'];
        $currentRoomType = 0;
        $imageFolder = public_path('img/rooms');
        for ($i = 1; $i <= 25; $i++) {

            $imageFolderPath = $imageFolder . '/' . $roomTypes[$currentRoomType];
            $images = File::files($imageFolderPath);

            foreach ($images as $image) {
                $imageName = pathinfo($image, PATHINFO_FILENAME);
                $imagePath = Str::after($image, public_path());

                DB::table('images')->insert([
                    'hotel_id' => null,
                    'room_id' => $i,
                    'filename' => $imageName,
                    'path' => $imagePath,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
            if ($i % 5 === 0) {
                $currentRoomType++;
            }
        }
    }
}
