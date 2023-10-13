<?php

namespace Database\Seeders;

use App\Models\Hotel;
use App\Models\Image;
use App\Models\Room;
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
                'short_description' => 'Фитнес-центр',
                'full_description' => 'У нас есть современный фитнес-центр с оборудованием последнего поколения, чтобы помочь вам поддерживать свою форму во время пребывания.',
            ],
            [
                'short_description' => 'Бесплатный Wi-Fi',
                'full_description' => 'Бесплатная сеть высокоскоростного интернета по Wi-Fi во всех обзщественных местах отеля.',
            ],
            [
                'short_description' => 'Бесплатная парковка',
                'full_description' => 'Огромная бесплатаная охраняемая парковка для всех постояльцев отеля. С нами Вы можете не беспокоится о поиске сохранного места для вашего любимого автомобиля.',
            ],
            [
                'short_description' => 'Бассейн',
                'full_description' => 'Расслабьтесь и охладитесь в нашем бассейне под открытым небом или просто отдохните на шезлонге. Рядом с бассейном всегда работает мини-бар.',
            ],
            [
                'short_description' => 'Ресторан высокой кухни',
                'full_description' => 'Попробуйте изысканные блюда от наших шеф-поваров в нашем ресторане высокой кухни, где каждое блюдо - настоящее произведение искусства.',
            ],
            [
                'short_description' => 'SPA',
                'full_description' => ' Посетите наш спа-центр для полного расслабления и ухода за собой. У нас работают самые проффесиональные массажисты',
            ],
            [
                'short_description' => 'Доступная среда',
                'full_description' => 'Мы обеспечили комплексное оснащение инфраструктуры нашего отеля для нужд инвалидов всех категорий',
            ],
            [
                'short_description' => 'Трансфер',
                'full_description' => 'Мы встретим вас в аэропорту и доставим обратно, когда Ваш отдых подойдёт к концу на роскошном автобусе.',
            ],
            [
                'short_description' => 'Приватный шеф-повар',
                'full_description' => 'Позвольте нашему приватному шеф-повару порадовать вас изысканными блюдами, приготовленными непосредственно в вашем люксе.',
            ],
            [
                'short_description' => 'Ежедневная уборка',
                'full_description' => 'Наши сотрудники проведут ежедневную уборку вашей комнаты для вашего комфорта и чистоты.',
            ],
            [
                'short_description' => 'Кондиционер',
                'full_description' => 'Наши стандартные комнаты оснащены кондиционером для поддержания комфортной температуры в любое время года.',
            ],
            [
                'short_description' => 'Фен',
                'full_description' => 'Фены марки VALERA – номер 1 в мире. Наши номера укомплектованы фенами для сушки волос торговой марки VALERA, являющейся синонимом высочайшего качества и надежности.',
            ],
            [
                'short_description' => 'Чайник',
                'full_description' => 'Чайник BORK K703. Изящная модель в стальном корпусе с хромированной ручкой.',
            ],
            [
                'short_description' => 'Сейф',
                'full_description' => 'Гостиничный сейф AIKO с электронным замком для обеспечения сохранности денег, ценных предметов и документов.',
            ],
            [
                'short_description' => 'Холодильник с мини баром',
                'full_description' => 'Холодильник Liebherr обладает хорошей вместимостью. С этим холодильником вы поймете, что такое удобство и универсальность, а наполнение порадует вас разнообразием и изысканностью.',
            ],
            [
                'short_description' => 'Приветственный набор',
                'full_description' => 'При въезде вас ждет приветственный набор с фруктами, шампанским и другими приятными мелочами.',
            ],
            [
                'short_description' => 'VIP обслуживание',
                'full_description' => 'Наши сотрудники готовы предоставить вам круглосуточное обслуживание номеров, чтобы удовлетворить все ваши потребности и пожелания.',
            ],
            [
                'short_description' => 'Телевизор',
                'full_description' => 'Прекрасные телевизоры с диагональю 120 дюймов и сочной UltraHD картинкой приятно удивят вас обилием каналов на любой вкус.',
            ],
            [
                'short_description' => 'Wi-Fi доступ',
                'full_description' => 'Доступ к высокоскоростному Wi-Fi в вашей комнате c неогрниченным количеством подключенных устройств.',
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
        $images = Image::all();
        $services = Service::all();
        foreach ($services as $service) {
            $iconFileName = $servicesToIcons[$service->short_description];
            foreach ($images as $image) {
                if ($image->filename === $iconFileName) {
                    DB::table('service_images')->insert([
                        'service_id' => $service->id,
                        'image_id' => $image->id,
                        'is_icon' => true,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                } elseif (str_contains($image->filename, $iconFileName)) {
                    DB::table('service_images')->insert([
                        'service_id' => $service->id,
                        'image_id' => $image->id,
                        'is_icon' => false,
                        'created_at' => now(),
                        'updated_at' => now(),
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
                if (in_array($service->short_description, $servicesToHotels)) {
                    DB::table('hotel_services')->insert([
                        'service_id' => $service->id,
                        'hotel_id' => $hotel->id,
                        'created_at' => now(),
                        'updated_at' => now(),
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
                ],
                'included' => [
                    'Приватный шеф-повар',
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
        ];
        $rooms = Room::all();
        foreach ($rooms as $room) {
            $allRoomTypeServices = $servicesToRooms[$room->room_type];
            $additionalServices = $allRoomTypeServices['additional'];
            $includedServices = $allRoomTypeServices['included'];
            foreach ($services as $service) {
                foreach ($additionalServices as $additionalService) {
                    if ($service->short_description === $additionalService) {
                        DB::table('room_services')->insert([
                            'service_id' => $service->id,
                            'room_id' => $room->id,
                            'additional' => true,
                            'created_at' => now(),
                            'updated_at' => now(),
                        ]);
                    }
                }
                foreach ($includedServices as $includedService) {
                    if ($service->short_description === $includedService) {
                        DB::table('room_services')->insert([
                            'service_id' => $service->id,
                            'room_id' => $room->id,
                            'additional' => false,
                            'created_at' => now(),
                            'updated_at' => now(),
                        ]);
                    }
                }
            }
        }
    }
}
