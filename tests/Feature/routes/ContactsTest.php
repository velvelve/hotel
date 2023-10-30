<?php

namespace Tests\Feature;

use Tests\TestCase;

class ContactsTest extends TestCase
{
    //  Проверка доступности страницы контакты.
    public function testContactsIndex()
    {
        //  Выполняем GET-запрос на маршрут contacts.index
        $response = $this->get(route('contacts.index'));

        //  Утверждаем, что ответ имеет статус 200 (успешный запрос)
        $response->assertStatus(200);

        //  Утверждаем, что в ответе присутствует определенный текст или элемент
        $response->assertSee('Контакты');
    }

    //  Проверка отправки сообщения
    public function testSendMessage()
    {
        // Создаем фиктивные данные для отправки сообщения
        $data = [
            'name' => 'Sergey',
            'email' => 'john@example.com',
            'phone' => '1234567890',
            'hotel' => 'Hotel',
            'category' => 'Оставить отзыв',
            'message' => 'Test message',
            'agreement' => true,
        ];

        //  Выполняем POST-запрос на маршрут contacts.sendMessage с передачей фиктивных данных
        $response = $this->post(route('contacts.sendMessage'), $data);

        //  Утверждаем, что ответ имеет статус 302 (перенаправление)
        $response->assertStatus(302);

        //  Утверждаем, что произошло перенаправление на определенный маршрут
        $response->assertRedirect('/');

        //  Проверяем, что в сессии есть определенное значение
        $this->assertTrue(session()->has('success'));

        //  Проверяем, что в сессии установлено значение `'success'`, и это значение равно `'Ваше сообщение успешно отправлено!'`.
        $this->assertEquals('Ваше сообщение успешно отправлено!', session('success'));
    }
}
