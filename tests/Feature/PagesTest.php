<?php

namespace Tests\Feature;

use Tests\TestCase;

class PagesTest extends TestCase
{

    /**
     * Проверка доступности главной страницы
     */
    public function testMainPageIndexRoute(): void
    {
        // Выполняем GET-запрос на маршрут '/'
        $response = $this->get('/');

        // Проверяем, что ответ имеет статус 200 (успешный запрос)
        $response->assertStatus(200);
    }

    /**
     * Проверка доступности страницы категории номеров
     */
    public function testRoomTypesIndexRoute()
    {
        // Выполняем GET-запрос на маршрут '/rooms-types'
        $response = $this->get('/rooms-types');

        // Проверяем, что ответ имеет статус 200 (успешный запрос)
        $response->assertStatus(200);

        // Проверяем, что представление, связанное с этим ответом, является 'room-types'
        $response->assertViewIs('rooms.types');
    }

    /**
     * Проверка доступности страницы контактов
     */
    public function testContactsIndexRoute()
    {
        $response = $this->get('/contacts');

        // Проверяем, что ответ имеет статус 200 (успешный запрос)
        $response->assertStatus(200);

        // Проверяем, что представление, связанное с этим ответом, является 'room-types'
        $response->assertViewIs('contacts.index');
    }

    /**
     * Проверка доступности страницы входа
     */
    public function testLoginIndexRoute()
    {
        $response = $this->get('/login');

        // Проверяем, что ответ имеет статус 200 (успешный запрос)
        $response->assertStatus(200);

        // Проверяем, что представление, связанное с этим ответом, является 'room-types'
        $response->assertViewIs('auth.login');
    }

    /**
     * Проверка доступности страницы регистрации
     */
    public function testRegisterIndexRoute()
    {
        $response = $this->get('/register');

        // Проверяем, что ответ имеет статус 200 (успешный запрос)
        $response->assertStatus(200);

        // Проверяем, что представление, связанное с этим ответом, является 'room-types'
        $response->assertViewIs('auth.register');
    }
}
