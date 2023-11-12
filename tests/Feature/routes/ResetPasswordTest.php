<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Tests\TestCase;

class ResetPasswordTest extends TestCase
{
    /**
     *Этот метод проверяет, что страница сброса пароля может быть отображена.
     * Он отправляет GET-запрос на маршрут password.reset с тестовым токеном и проверяет,
     * что ответ имеет статус 200 и отображает представление auth.reset-password.
     */
    public function test_reset_password_page_can_be_rendered()
    {
        // Отправляем GET-запрос на маршрут 'password.reset' с тестовым токеном 'test-token'
        $response = $this->get(route('password.reset', ['token' => 'test-token']));

        // Проверяем, что ответ имеет статус 200 (успешный запрос)
        $response->assertStatus(200);

        // Проверяем, что ответ отображает представление 'auth.reset-password'
        $response->assertViewIs('auth.reset-password');
    }

    /**
     * Этот метод проверяет, что пароль может быть успешно сброшен. Он находит пользователя,
     * создает токен для сброса пароля, затем отправляет POST-запрос на маршрут password.update
     * с данными для обновления пароля. После этого он проверяет, что пароль пользователя был успешно изменен,
     * что ответ перенаправляет на маршрут login и что в сессии присутствует сообщение об успешном сбросе пароля.
     */
    public function test_password_can_be_reset()
    {
        // Находим пользователя с идентификатором 1
        $user = User::find(1);

        // Создаем токен для сброса пароля с использованием фасада Password
        $token = Password::createToken($user);

        // Отправляем POST-запрос на маршрут 'password.update' с данными для обновления пароля
        $response = $this->post(route('password.update'), [
            'token' => $token,
            'email' => $user->email,
            'password' => 'new-password',
            'password_confirmation' => 'new-password',
        ]);

        // Проверяем, что пароль пользователя был успешно изменен
        $this->assertTrue(Hash::check('new-password', $user->fresh()->password));

        // Проверяем, что ответ перенаправляет на маршрут 'login'
        $response->assertRedirect(route('login'));

        // Проверяем, что в сессии присутствует сообщение об успешном сбросе пароля
        $response->assertSessionHas('status', trans(Password::PASSWORD_RESET));
    }

    /**
     * Этот метод проверяет, что сброс пароля не происходит при использовании недействительного токена.
     * Он находит пользователя, создает действительный токен для сброса пароля,
     * затем отправляет POST-запрос на маршрут password.update с недействительным токеном.
     * Метод проверяет, что в сессии присутствует ошибка с ключом 'email'
     * и сообщением 'This password reset token is invalid.'.
     */
    public function test_password_reset_fails_with_invalid_token()
    {
        // Находим пользователя с идентификатором 1
        $user = User::find(1);

        // Создаем действительный токен для сброса пароля с использованием фасада Password
        $validToken = Password::createToken($user);

        // Изменяем действительный токен, чтобы он стал недействительным
        $invalidToken = 'invalid-token';

        // Отправляем POST-запрос на маршрут 'password.update' с недействительным токеном и другими данными для обновления пароля
        $response = $this->post(route('password.update'), [
            'token' => $invalidToken,
            'email' => $user->email,
            'password' => 'new-password',
            'password_confirmation' => 'new-password',
        ]);

        // Проверяем, что в сессии присутствуют ошибки с соответствующим сообщением
        $response->assertSessionHasErrors(['email' => 'This password reset token is invalid.']);
    }

    /**
     * Этот метод проверяет, что сброс пароля не происходит при использовании недействительного адреса электронной почты.
     * Он отправляет POST-запрос на маршрут password.update с недействительным адресом электронной почты.
     * Метод проверяет, что в сессии присутствует ошибка с ключом 'email'.
     */
    public function test_password_reset_fails_with_invalid_email()
    {
        $response = $this->post(route('password.update'), [
            'token' => 'test-token',
            'email' => 'invalid-email@example.com',
            'password' => 'new-password',
            'password_confirmation' => 'new-password',
        ]);

        $response->assertSessionHasErrors(['email']);
    }

    /**
     *  Этот метод проверяет, что сброс пароля не происходит при неправильном подтверждении пароля.
     * Он находит пользователя, создает токен для сброса пароля, затем отправляет POST-запрос на маршрут password.
     * update с неправильным подтверждением пароля. Метод проверяет, что в сессии присутствует ошибка с ключом 'password'.
     */
    public function test_password_reset_fails_with_invalid_password_confirmation()
    {
        $user = User::find(1);

        $token = Password::createToken($user);

        $response = $this->post(route('password.update'), [
            'token' => $token,
            'email' => $user->email,
            'password' => 'new-password',
            'password_confirmation' => 'invalid-confirmation',
        ]);

        $response->assertSessionHasErrors(['password']);
    }
}
