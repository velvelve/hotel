<?php

namespace Tests\Feature;

use App\Http\Controllers\SearchController;
use App\Http\Requests\Search\SearchRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SearchRoomsTest extends TestCase
{
    // Проверяем, что при выполнении GET-запроса на маршрут `search.rooms`, сервер возвращает успешный статус ответа.
    public function testSearchRoomsGet()
    {
        // Выполняем GET-запрос на маршрут search.rooms
        $response = $this->get(route('search.rooms'));

        // Утверждаем, что ответ имеет статус 302 (успешный запрос)
        $response->assertStatus(302);

        // Следуем перенаправлению
        $response = $this->followRedirects($response);

        // Утверждаем, что конечный ответ имеет статус 200 (успешный запрос)
        $response->assertStatus(200);
    }

    // Проверка работоспособности поиска свободных номеров
    public function testSearchRoomsPost()
    {
        // Создаем тестовые данные для отправки POST-запроса
        $data = [
            'date_range' => '2022-01-01 - 2022-01-05',
            'guest_count' => 2,
        ];

        // Выполняем POST-запрос на маршрут search.rooms с тестовыми данными
        $response = $this->post(route('search.rooms'), $data);

        // Утверждаем, что ответ имеет статус 200 (успешный запрос)
        $response->assertStatus(200);

        // Проверяем наличие текста на странице.
        $response->assertSee('Результаты поиска :');
    }
}
