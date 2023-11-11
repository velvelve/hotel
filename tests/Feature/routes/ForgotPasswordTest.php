<?php

namespace Tests\Feature\routes;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Password;
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

    // Тест проверяет, что при успешной отправке ссылки на сброс пароля пользователь будет перенаправлен обратно с сообщением статуса.
    public function test_store_method_sends_reset_link_and_redirects_back_with_status()
    {
        // Находим пользователя
        $user = User::find(1);

        // Подготавливаем данные для запроса
        $data = [
            'email' => $user->email,
        ];

        // Мокаем метод `sendResetLink` из `Password` фасада, чтобы он возвращал `RESET_LINK_SENT`
        Password::shouldReceive('sendResetLink')
            ->once()
            ->with(['email' => $data['email']])
            ->andReturn(Password::RESET_LINK_SENT);

        // Отправляем POST запрос на `/forgot-password`
        $response = $this->post(route('password.request', $data));

        // Проверяем, что пользователь был перенаправлен обратно и получил статус;
        $response->assertRedirect(route('password.email'));
        $response->assertSessionHas('status', trans(Password::RESET_LINK_SENT));
    }

    // Тест проверяет, что если ссылка на сброс пароля не была отправлена, пользователь будет перенаправлен обратно с ошибкой.
    public function test_store_method_redirects_back_with_errors_if_reset_link_not_sent()
    {
        // Находим пользователя
        $user = User::find(2);

        // Подготавливаем данные для запроса
        $data = [
            'email' => 'mccullough.salvatore@example.org',
        ];

        // Мокаем метод `sendResetLink` из `Password` фасада, чтобы он возвращал `INVALID_USER`
        Password::shouldReceive('sendResetLink')
            ->once()
            ->with(['email' => $data['email']])
            ->andReturn(Password::INVALID_USER);

        // Отправляем POST запрос на `/forgot-password`
        $response = $this->post('/forgot-password', $data);

        // Проверяем, что пользователь был перенаправлен обратно и получил ошибку
        $response->assertRedirect('/forgot-password');
        $response->assertSessionHasErrors(['email' => trans(Password::INVALID_USER)]);
    }
}
