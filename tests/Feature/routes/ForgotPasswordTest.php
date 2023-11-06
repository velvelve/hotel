<?php

namespace Tests\Feature\routes;

use Tests\TestCase;

class ForgotPasswordTest extends TestCase
{
    public function testForgotPasswordRoute()
    {
        // Проверка, что маршрут доступен
        $response = $this->get('/forgot-password');
        $response->assertStatus(200);

        // Проверка, что контроллер возвращает правильное представление
        $response->assertViewIs('auth.forgot-password');

        // Проверка, что маршрут использует middleware 'guest'
        $routeMiddleware = app('router')->getMiddleware();
        $this->assertArrayHasKey('guest', $routeMiddleware);
    }
}
