<?php

namespace Database\Seeders;

use App\Models\Booking;
use App\Models\Hotel;
use App\Models\HotelService;
use App\Models\Image;
use App\Models\ImageService;
use App\Models\Room;
use App\Models\RoomService;
use App\Models\Service;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Service::factory()->createMany([
            [
                'name' => 'Фитнес-центр',
                'full_description' => 'У нас есть современный фитнес-центр с оборудованием последнего поколения, чтобы помочь вам поддерживать свою форму во время пребывания.',
                'price' => 0.00,
                'constant' => "FITNESS"
            ],
            [
                'name' => 'Бесплатный Wi-Fi',
                'full_description' => 'Бесплатная сеть высокоскоростного интернета по Wi-Fi во всех обзщественных местах отеля.',
                'price' => 0.00,
                'constant' => "FREEWIFI"
            ],
            [
                'name' => 'Бесплатная парковка',
                'full_description' => 'Огромная бесплатаная охраняемая парковка для всех постояльцев отеля. С нами Вы можете не беспокоится о поиске сохранного места для вашего любимого автомобиля.',
                'price' => 0.00,
                'constant' => "PARKING"
            ],
            [
                'name' => 'Бассейн',
                'full_description' => 'Расслабьтесь и охладитесь в нашем бассейне под открытым небом или просто отдохните на шезлонге. Рядом с бассейном всегда работает мини-бар.',
                'price' => 0.00,
                'constant' => "POOL"
            ],
            [
                'name' => 'Ресторан высокой кухни',
                'full_description' => 'Попробуйте изысканные блюда от наших шеф-поваров в нашем ресторане высокой кухни, где каждое блюдо - настоящее произведение искусства.',
                'price' => 0.00,
                'constant' => "RESTAURANT"
            ],
            [
                'name' => 'SPA',
                'full_description' => ' Посетите наш спа-центр для полного расслабления и ухода за собой. У нас работают самые проффесиональные массажисты',
                'price' => 0.00,
                'constant' => "SPA"
            ],
            [
                'name' => 'Доступная среда',
                'full_description' => 'Мы обеспечили комплексное оснащение инфраструктуры нашего отеля для нужд инвалидов всех категорий',
                'price' => 0.00,
                'constant' => "DISABLEDASSISTANCE"
            ],
            [
                'name' => 'Трансфер',
                'full_description' => 'Мы встретим вас в аэропорту и доставим обратно, когда Ваш отдых подойдёт к концу на роскошном автобусе.',
                'price' => 0.00,
                'constant' => "TRANSFER"
            ],
            [
                'name' => 'Приватный шеф-повар',
                'full_description' => 'Позвольте нашему приватному шеф-повару порадовать вас изысканными блюдами, приготовленными непосредственно в вашем люксе.',
                'price' => 185.00,
                'constant' => "COOKCHIEF"
            ],
            [
                'name' => 'Ежедневная уборка',
                'full_description' => 'Наши сотрудники проведут ежедневную уборку вашей комнаты для вашего комфорта и чистоты.',
                'price' => 87.00,
                'constant' => "CLEANING"
            ],
            [
                'name' => 'Кондиционер',
                'full_description' => 'Наши стандартные комнаты оснащены кондиционером для поддержания комфортной температуры в любое время года.',
                'price' => 52.00,
                'constant' => "CLEANING"
            ],
            [
                'name' => 'Фен',
                'full_description' => 'Фены марки VALERA – номер 1 в мире. Наши номера укомплектованы фенами для сушки волос торговой марки VALERA, являющейся синонимом высочайшего качества и надежности.',
                'price' => 44.00,
                'constant' => "HAIRDRYER"
            ],
            [
                'name' => 'Чайник',
                'full_description' => 'Чайник BORK K703. Изящная модель в стальном корпусе с хромированной ручкой.',
                'price' => 25.00,
                'constant' => "KETTLE"
            ],
            [
                'name' => 'Сейф',
                'full_description' => 'Гостиничный сейф AIKO с электронным замком для обеспечения сохранности денег, ценных предметов и документов.',
                'price' => 48.00,
                'constant' => "LOCKER"
            ],
            [
                'name' => 'Холодильник с мини баром',
                'full_description' => 'Холодильник Liebherr обладает хорошей вместимостью. С этим холодильником вы поймете, что такое удобство и универсальность, а наполнение порадует вас разнообразием и изысканностью.',
                'price' => 66.00,
                'constant' => "MINIBAR"
            ],
            [
                'name' => 'Приветственный набор',
                'full_description' => 'При въезде вас ждет приветственный набор с фруктами, шампанским и другими приятными мелочами.',
                'price' => 35.00,
                'constant' => "PRESENT"
            ],
            [
                'name' => 'VIP обслуживание',
                'full_description' => 'Наши сотрудники готовы предоставить вам круглосуточное обслуживание номеров, чтобы удовлетворить все ваши потребности и пожелания.',
                'price' => 113.00,
                'constant' => "VIPSERVICE"
            ],
            [
                'name' => 'Телевизор',
                'full_description' => 'Прекрасные телевизоры с диагональю 120 дюймов и сочной UltraHD картинкой приятно удивят вас обилием каналов на любой вкус.',
                'price' => 33.00,
                'constant' => "TV"
            ],
            [
                'name' => 'Wi-Fi доступ',
                'full_description' => 'Доступ к высокоскоростному Wi-Fi в вашей комнате c неогрниченным количеством подключенных устройств.',
                'price' => 49.00,
                'constant' => "ROOMWIFIF"
            ],
        ]);

        $servicesToIcons = [
            'Фитнес-центр' => 'fitness',
            'Бесплатный Wi-Fi' => 'freewifi',
            'Бесплатная парковка' => 'parking',
            'Бассейн' => 'pool',
            'Ресторан высокой кухни' => 'restaurant',
            'SPA' => 'spa',
            'Доступная среда' => 'support',
            'Трансфер' => 'transfer',
            'Приватный шеф-повар' => 'chief',
            'Ежедневная уборка' => 'cleaning',
            'Кондиционер' => 'conditioner',
            'Фен' => 'hairdryer',
            'Чайник' => 'kettle',
            'Сейф' => 'locker',
            'Холодильник с мини баром' => 'minibar',
            'Приветственный набор' => 'present',
            'VIP обслуживание' => 'service',
            'Телевизор' => 'tv',
            'Wi-Fi доступ' => 'wifi',
        ];
        $services = Service::all();

        $images = Image::all();

        foreach ($services as $service) {
            $iconFileName = $servicesToIcons[$service->name];
            foreach ($images as $image) {
                if ($image->filename === $iconFileName) {
                    ImageService::create([
                        'service_id' => $service->id,
                        'image_id' => $image->id,
                        'is_icon' => true,
                    ]);
                } elseif (str_contains($image->filename, $iconFileName)) {
                    ImageService::create([
                        'service_id' => $service->id,
                        'image_id' => $image->id,
                        'is_icon' => false,
                    ]);
                }
            }
        }
        $servicesToHotels = [
            'Фитнес-центр',
            'Бесплатный Wi-Fi',
            'Бесплатная парковка',
            'Бассейн',
            'Ресторан высокой кухни',
            'SPA',
            'Доступная среда',
            'Трансфер',
        ];
        $hotels = Hotel::all();
        foreach ($services as $service) {
            foreach ($hotels as $hotel) {
                if (in_array($service->name, $servicesToHotels)) {
                    HotelService::create([
                        'service_id' => $service->id,
                        'hotel_id' => $hotel->id,
                    ]);
                }
            }
        }
        $servicesToRooms = [
            'Standard' => [
                'additional' => [
                    'Приватный шеф-повар',
                    'Сейф',
                    'Холодильник с мини баром',
                    'VIP обслуживание',
                    'Приветственный набор',
                    'Фен',
                    'Wi-Fi доступ',
                    'Кондиционер',
                    'Телевизор',
                ],
                'included' => [
                    'Ежедневная уборка',
                    'Чайник',
                ]

            ],
            'Superior' => [
                'additional' => [
                    'Приватный шеф-повар',
                    'Сейф',
                    'Холодильник с мини баром',
                    'VIP обслуживание',
                    'Приветственный набор',
                    'Фен',
                    'Wi-Fi доступ',
                ],
                'included' => [
                    'Ежедневная уборка',
                    'Чайник',
                    'Кондиционер',
                    'Телевизор',
                ]

            ],
            'Premium' => [
                'additional' => [
                    'Приватный шеф-повар',
                    'Холодильник с мини баром',
                    'VIP обслуживание',
                    'Приветственный набор',
                ],
                'included' => [
                    'Ежедневная уборка',
                    'Чайник',
                    'Кондиционер',
                    'Телевизор',
                    'Фен',
                    'Wi-Fi доступ',
                    'Сейф',
                ]
            ],
            'Lux' => [
                'additional' => [
                    'Приватный шеф-повар',
                    'Приветственный набор',
                ],
                'included' => [
                    'Ежедневная уборка',
                    'Чайник',
                    'Кондиционер',
                    'Телевизор',
                    'Фен',
                    'Wi-Fi доступ',
                    'Сейф',
                    'Холодильник с мини баром',
                    'VIP обслуживание',
                ]
            ],
            'Family' => [
                'additional' => [
                    'Приветственный набор',
                    'VIP обслуживание',
                    'Приватный шеф-повар',
                    'Холодильник с мини баром',
                    'Сейф',
                ],
                'included' => [
                    'Ежедневная уборка',
                    'Чайник',
                    'Кондиционер',
                    'Телевизор',
                    'Фен',
                    'Wi-Fi доступ',
                ]
            ],
        ];
        $rooms = Room::all();
        foreach ($rooms as $room) {
            $allRoomTypeServices = $servicesToRooms[$room->roomType->name];
            $additionalServices = $allRoomTypeServices['additional'];
            $includedServices = $allRoomTypeServices['included'];
            foreach ($services as $service) {
                foreach ($additionalServices as $additionalService) {
                    if (
                        $service->name
                        === $additionalService
                    ) {
                        RoomService::create([
                            'service_id' => $service->id,
                            'room_id' => $room->id,
                            'additional' => true,
                        ]);
                    }
                }
                foreach ($includedServices as $includedService) {
                    if (
                        $service->name
                        === $includedService
                    ) {
                        RoomService::create([
                            'service_id' => $service->id,
                            'room_id' => $room->id,
                            'additional' => false,
                        ]);
                    }
                }
            }
        }
        $bookings = Booking::all();
        $allFamilyServices = $servicesToRooms['Family'];
        $bookedServices = $allFamilyServices['additional'];
        $filteredServices = $services->filter(function ($service) use ($bookedServices) {
            return in_array($service->name, $bookedServices);
        });
        foreach ($bookings as $booking) {
            $randomServices = $filteredServices->random(rand(1, 5));
            $booking->services()->attach($randomServices);
        }
    }
}
