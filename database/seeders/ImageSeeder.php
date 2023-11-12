<?php

namespace Database\Seeders;

use App\Enums\Rooms\RoomTypes;
use App\Models\Image;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roomTypes = RoomTypes::getRoomTypes();
        $currentRoomType = 0;

        for ($i = 1; $i <= 25; $i++) {

            $imageFolderPath = '/img/rooms/' . strtolower($roomTypes[$currentRoomType]);
            $images = Storage::files($imageFolderPath);
            foreach ($images as $image) {
                $imageName = pathinfo($image, PATHINFO_FILENAME);

                Image::create([
                    'hotel_id' => null,
                    'room_id' => $i,
                    'filename' => $imageName,
                    'path' => '/' . $image,
                ]);
            }
            if ($i % 5 === 0) {
                $currentRoomType++;
            }
        }

        $hotelServices = Storage::files('img/services/hotel');

        foreach ($hotelServices as $hotelService) {
            $hotelServiceFileName = pathinfo($hotelService, PATHINFO_FILENAME);

            Image::create([
                'hotel_id' => null,
                'room_id' => null,
                'filename' => $hotelServiceFileName,
                'path' => '/' . $hotelService,
            ]);
        }

        $roomServices = Storage::files('img/services/room');

        foreach ($roomServices as $roomService) {
            $roomServiceFileName = pathinfo($roomService, PATHINFO_FILENAME);

            Image::create([
                'hotel_id' => null,
                'room_id' => null,
                'filename' => $roomServiceFileName,
                'path' => '/' . $roomService,
            ]);
        }
    }
}
