<?php

namespace Tests\Feature\migrations;

use App\Models\BedType;
use App\Models\Hotel;
use App\Models\Room;
use App\Models\RoomType;
use App\Models\ViewType;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class RoomPaymentMigrationTest extends TestCase
{
    public function test_example(): void
    {
        // Проверяем, что таблица "rooms" была создана
        $this->assertTrue(Schema::hasTable('rooms'));

        // Проверяем столбцы таблицы "rooms"
        $this->assertTrue(Schema::hasColumns('rooms', [
            'id',
            'hotel_id',
            'description',
            'area',
            'apartment_count',
            'adults_max_guests',
            'children_max_guests',
            'price',
            'availability',
            'room_type_id',
            'view_type_id',
            'bed_type_id',
            'created_at',
            'updated_at',
        ]));
    }

    public function testRoomBelongsToViewType()
    {
        $room = Room::find(1);

        // Проверяем, что связь с view_types установлена
        $this->assertInstanceOf(ViewType::class, $room->viewType);
    }

    public function testRoomBelongsToBedType()
    {
        $room = Room::find(1);

        // Проверяем, что связь с bed_types установлена
        $this->assertInstanceOf(BedType::class, $room->bedType);
    }

    public function testRoomBelongsToRoomType()
    {
        $room = Room::find(1);

        // Проверяем, что связь с room_types установлена
        $this->assertInstanceOf(RoomType::class, $room->roomType);
    }

    public function testRoomBelongsToHotel()
    {
        $room = Room::find(1);

        // Проверяем, что связь с hotels установлена
        $this->assertInstanceOf(Hotel::class, $room->hotel);
    }
}
