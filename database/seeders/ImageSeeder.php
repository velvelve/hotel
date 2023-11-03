<?php

namespace Database\Seeders;

use App\Enums\Rooms\RoomTypes;
use App\Models\Image;

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
        $roomTypes = RoomTypes::getRoomTypes();
        $currentRoomType = 0;
        $imageFolder = public_path('img/rooms');
        for ($i = 1; $i <= 25; $i++) {

            $imageFolderPath = $imageFolder . '/' . strtolower($roomTypes[$currentRoomType]);
            $images = File::files($imageFolderPath);

            foreach ($images as $image) {
                $imageName = pathinfo($image, PATHINFO_FILENAME);
                $imagePath = Str::after($image, public_path());

                Image::create([
                    'hotel_id' => null,
                    'room_id' => $i,
                    'filename' => $imageName,
                    'path' => $imagePath,
                ]);
            }
            if ($i % 5 === 0) {
                $currentRoomType++;
            }
        }

        $hotelServicesFolder = public_path('img/services/hotel');

        $hotelServices = File::files($hotelServicesFolder);

        foreach ($hotelServices as $hotelService) {
            $hotelServiceFileName = pathinfo($hotelService, PATHINFO_FILENAME);
            $hotelServicePath = Str::after($hotelService, public_path());

            Image::create([
                'hotel_id' => null,
                'room_id' => null,
                'filename' => $hotelServiceFileName,
                'path' => $hotelServicePath,
            ]);
        }

        $roomServicesFolder = public_path('img/services/room');

        $roomServices = File::files($roomServicesFolder);

        foreach ($roomServices as $roomService) {
            $roomServiceFileName = pathinfo($roomService, PATHINFO_FILENAME);
            $roomServicePath = Str::after($roomService, public_path());

            Image::create([
                'hotel_id' => null,
                'room_id' => null,
                'filename' => $roomServiceFileName,
                'path' => $roomServicePath,
            ]);
        }
    }
}
