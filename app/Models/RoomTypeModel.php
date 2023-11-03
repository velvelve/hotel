<?php

namespace App\Models;

class RoomTypeModel
{

    public function __construct(
        public string $roomTypeName = '',
        public string $roomTypeDescription = '',
        public int $totalRooms = 0,
        public int $totalAvailableRooms = 0,
        public int $minRoomNumber = 0,
        public int $maxRoomNumber = 0,
        public int $minArea = 0,
        public int $maxArea = 0,
        public int $minApartmentCount = 0,
        public int $maxApartmentCount = 0,
        public int $minMaxGuests = 0,
        public int $maxMaxGuests = 0,
        public float $minPrice = 0.0,
        public float $maxPrice = 0.0,
        public string $bedTypeDescriptions = '',
        public string $viewTypeDescriptions = '',
        public array $images = [],
        public array $includedServices = [],
    ) {
    }

    public function getPriceRange()
    {
        return "от $this->minPrice до $this->maxPrice";
    }

    public function getAreaRange()
    {
        return "от $this->minArea до $this->maxArea";
    }

    public function getGuestCountRange()
    {
        return "от $this->minMaxGuests до $this->maxMaxGuests";
    }

    public static function getRoomTypesArray()
    {
        $allRoomTypes = RoomType::distinct()->get(['id', 'name', 'description', 'constant']);

        $roomTypeModels = [];

        foreach ($allRoomTypes as $roomType) {
            $roomsSameType = Room::where('room_type_id', $roomType->id)->get();
            $totalRooms = count($roomsSameType);
            $totalAvailableRooms = 0;
            foreach ($roomsSameType as $room) {
                if ($room->availability) {
                    $totalAvailableRooms++;
                }
            }
            $minRoomNumber = PHP_INT_MAX;
            $maxRoomNumber = 0;

            foreach ($roomsSameType as $room) {
                $roomNumber = intval($room->room_number);
                if ($roomNumber == 0) {
                    continue;
                }
                if ($roomNumber < $minRoomNumber) {
                    $minRoomNumber = $roomNumber;
                }
                if ($roomNumber > $maxRoomNumber) {
                    $maxRoomNumber = $roomNumber;
                }
            }

            $minArea = PHP_INT_MAX;
            $maxArea = 0;

            foreach ($roomsSameType as $room) {
                $area = $room->area;
                if ($area < $minArea) {
                    $minArea = $area;
                }
                if ($area > $maxArea) {
                    $maxArea = $area;
                }
            }
            $minApartmentCount = PHP_INT_MAX;
            $maxApartmentCount = 0;

            foreach ($roomsSameType as $room) {
                $appartmentCount = $room->apartment_count;
                if ($appartmentCount < $minApartmentCount) {
                    $minApartmentCount = $appartmentCount;
                }
                if ($appartmentCount > $maxApartmentCount) {
                    $maxApartmentCount = $appartmentCount;
                }
            }

            $minMaxGuests = PHP_INT_MAX;
            $maxMaxGuests = 0;

            foreach ($roomsSameType as $room) {
                $adultsCount = $room->adults_max_guests;
                $childrenCount = $room->children_max_guests;
                $totalGuestCount = $adultsCount + $childrenCount;
                if ($totalGuestCount < $minMaxGuests) {
                    $minMaxGuests = $totalGuestCount;
                }
                if ($totalGuestCount > $maxMaxGuests) {
                    $maxMaxGuests = $totalGuestCount;
                }
            }

            $minPrice = PHP_FLOAT_MAX;
            $maxPrice = 0.0;

            foreach ($roomsSameType as $room) {
                $price = $room->price;
                if ($price < $minPrice) {
                    $minPrice = $price;
                }
                if ($price > $maxPrice) {
                    $maxPrice = $price;
                }
            }

            $bedTypeDescriptions = '';
            foreach ($roomsSameType as $room) {
                $bedDescription = $room->bedType->description;
                if (!str_contains($bedTypeDescriptions, $bedDescription)) {
                    if ($bedTypeDescriptions !== '') {
                        $bedTypeDescriptions .= ', ';
                    }
                    $bedTypeDescriptions .= $bedDescription;
                }
            }

            $viewTypeDescriptions = '';
            foreach ($roomsSameType as $room) {
                $viewDescription = $room->viewType->description;
                if (!str_contains($viewTypeDescriptions, $viewDescription)) {
                    if ($viewTypeDescriptions !== '') {
                        $viewTypeDescriptions .= ', ';
                    }
                    $viewTypeDescriptions .= $viewDescription;
                }
            }

            $imagesPaths = [];

            foreach ($roomsSameType as $room) {
                if (empty($room->images)) {
                    continue;
                }
                $uniqueImagePath = self::getUniqueImagePath(0, $room->images, $imagesPaths);

                if ($uniqueImagePath !== null) {
                    $imagesPaths[] = $uniqueImagePath;
                }
            }
            if (empty($imagesPaths)) {
                $imagesPaths = 'img/no_image_icon.svg';
            }

            $services = [];

            foreach ($roomsSameType as $room) {
                if (empty($room->includedServices)) {
                    continue;
                }
                $filteredArray = self::fillUniqueServices($room->includedServices, $services);
                $services = array_merge($services, $filteredArray);
            }
            $roomTypeModels[] = new RoomTypeModel(
                $roomType->name,
                $roomType->description,
                $totalRooms,
                $totalAvailableRooms,
                $minRoomNumber,
                $maxRoomNumber,
                $minArea,
                $maxArea,
                $minApartmentCount,
                $maxApartmentCount,
                $minMaxGuests,
                $maxMaxGuests,
                $minPrice,
                $maxPrice,
                $bedTypeDescriptions,
                $viewTypeDescriptions,
                $imagesPaths,
                $services,
            );
        }
        usort($roomTypeModels, function ($first, $second) {
            return ($first->minPrice > $second->minPrice);
        });
        return $roomTypeModels;
    }

    private static function getUniqueImagePath(int $position, $allRoomImages, $resultImages)
    {
        if ($position >= count($allRoomImages)) {
            return null;
        }
        if (!in_array($allRoomImages[$position]->path, $resultImages)) {
            return $allRoomImages[$position]->path;
        } else {
            $position = $position + 1;
            return self::getUniqueImagePath($position, $allRoomImages, $resultImages);
        }
    }

    private static function fillUniqueServices($allRoomServices, $allRoomTypeServices)
    {
        $result = [];

        foreach ($allRoomServices as $thatRoomService) {
            $id1 = $thatRoomService->id;
            $found = false;

            foreach ($allRoomTypeServices as $roomTypeService) {
                $id2 = $roomTypeService->id;
                if ($id1 === $id2) {
                    $found = true;
                    break;
                }
            }

            if (!$found) {
                $result[] = $thatRoomService;
            }
        }
        return $result;
    }
}
