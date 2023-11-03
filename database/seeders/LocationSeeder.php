<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Country;
use Illuminate\Database\Seeder;
use App\Models\Location;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Country::create([
            'name' => 'Россия',
        ]);
        $cities = ['Адлер', 'Сочи', 'Туапсе', 'Геленджик', 'Анапа', 'Кармадон', 'Нальчик', 'Светлогорск', 'Сольвычегодск', 'Горячинск'];

        foreach ($cities as $city) {
            City::create([
                'name' => $city,
                'country_id' => 1,
            ]);
        }
        Location::create([
            'country_id' => 1,
            'city_id' => 2,
            'street' => 'ул. Ленина',
            'house' => '10'
        ]);
    }
}
