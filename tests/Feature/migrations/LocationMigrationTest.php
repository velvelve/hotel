<?php

namespace Tests\Feature;

use App\Models\City;
use App\Models\Country;
use App\Models\Location;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class LocationMigrationTest extends TestCase
{
    public function test_example(): void
    {
        // Проверяем, что таблица "locations" была создана
        $this->assertTrue(Schema::hasTable('locations'));

        // Проверяем столбцы таблицы "locations"
        $this->assertTrue(Schema::hasColumns('locations', [
            'id',
            'country_id',
            'city_id',
            'street',
            'house',
            'created_at',
            'updated_at',
        ]));
    }
    public function testLocationHasCountry()
    {
        $location = Location::find(1);

        // Проверяем, что у брони есть с комнатой
        $this->assertInstanceOf(Country::class, $location->country);
    }

    public
    function testLocationHasCity()
    {
        $location = Location::find(1);

        // Проверяем, что у брони есть с комнатой
        $this->assertInstanceOf(City::class, $location->city);
    }
}
