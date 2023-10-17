<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class RegistrationAuthorizationTest extends TestCase
{
    public function testRegisterRouteGet()
    {
        $response = $this->get(route('register'));
        $response->assertStatus(200);
        $response->assertViewIs('auth.register');
    }

    public function testRegisterRoutePost()
    {
        // Задаем данные пользователя для регистрации
        $data = [
            'first_name' => 'Андрей',
            'last_name' => 'Смирнов',
            'email' => 'kwuhn.dax@example.net',
            'password' => 'password',
            'password_confirmation' => 'password',
        ];

        // Отправляем POST-запрос на роут регистрации
        $response = $this->post(route('register'), $data);

        // Проверяем, что регистрация прошла успешно
        $response->assertStatus(302);
        $response->assertRedirect(route('home'));

        // Проверьте, что пользователь был добавлен в базу данных
        $this->assertDatabaseHas('users', [
            'first_name' => 'Андрей',
            'last_name' => 'Смирнов',
            'email' => 'kwuhn.dax@example.net',
        ]);

        // Проверьте хэшированное значение пароля
        $user = User::where('email', 'kwuhn.dax@example.net')->first();
        $this->assertTrue(Hash::check('password', $user->password));
    }

    // Проверяет страницу входа.
    public function testLoginPage()
    {
        // Получаем ответ от маршрута 'login'
        $response = $this->get(route('login'));

        // Проверяем, что статус ответа равен 200 (Успешный статус)
        $response->assertStatus(200);

        // Проверяем, что представление - 'auth.login'
        $response->assertViewIs('auth.login');
    }

    // Тестирование входа пользователя
    public function testLoginPost()
    {
        // Находим пользователя с идентификатором 1
        $user = User::find(1);
        // Авторизуемся от имени данного пользователя
        $response = $this->actingAs($user)->post(route('login'));
        // Проверяем, что статус ответа равен 302 (перенаправление)
        $response->assertStatus(302);
        // Проверяем, что после входа в систему мы перенаправляемся на главную страницу
        $response->assertRedirect(route('home'));
    }

    // Тестирование выхода пользователя
    public function testLogout()
    {
        // Находим пользователя с идентификатором 1
        $user = User::find(1);

        // Авторизуемся от имени данного пользователя
        $response = $this->actingAs($user)->get(route('logout'));

        // Проверяем, что статус ответа равен 302 (перенаправление)
        $response->assertStatus(302);

        // Проверяем, что после выхода из системы мы перенаправляемся на главную страницу
        $response->assertRedirect(route('home'));
    }

    // Тестирование страницы профиля
    public function testProfilePage()
    {
        // Получение пользователя с идентификатором 1
        $user = User::find(1);

        // Авторизация пользователя
        $response = $this->actingAs($user)->get(route('profile'));

        // Проверка статуса ответа - должен быть 200 (успешный запрос)
        $response->assertStatus(200);

        // Проверка наличия текста "Профиль" на странице
        $response->assertSeeText('Профиль');
    }
}
