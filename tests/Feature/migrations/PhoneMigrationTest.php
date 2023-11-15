<?php

namespace Tests\Feature\migrations;

use App\Models\Hotel;
use App\Models\Phone;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class PhoneMigrationTest extends TestCase
{
    public function test_example(): void
    {
        // Проверяем, что таблица "phones" была создана
        $this->assertTrue(Schema::hasTable('hotel_phones'));

        // Проверяем столбцы таблицы "phones"
        $this->assertTrue(Schema::hasColumns('hotel_phones', [
            'id',
            'hotel_id',
            'number',
            'created_at',
            'updated_at',
        ]));
    }

    public function testPhoneHasHotel()
    {
        $phone = Phone::find(1);

        // Проверяем, что связь с roles установлена
        $this->assertInstanceOf(Hotel::class, $phone->hotel);
    }
}
