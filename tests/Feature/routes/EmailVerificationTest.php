<?php

namespace Tests\Feature;

use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Support\Facades\URL;
use Tests\TestCase;

class EmailVerificationTest extends TestCase
{
    //  Тест проверяет перенаправление на страницу подтверждения адреса электронной почты.
    public function testEmailConfirmationRedirect()
    {
        //  Создаем пользователя
        $user = User::factory()->create([
            'first_name' => 'Иван',
            'middle_name' => 'Иванович',
            'last_name' => 'Иванов',
            'phone' => '+79324562345',
            'email' => 'sdffq@fsd.ru',
            'password' => '123456789',
            'email_verified_at' => null,
        ]);

        //  Выполняем GET-запрос на маршрут '/email-confirmation' от имени пользователя
        $response = $this->actingAs($user)->get('/email-confirmation');

        //  Проверяем, что ответ имеет статус 200 (успешный запрос)
        $response->assertStatus(200);

        //  Проверяем, что представление, связанное с этим ответом, является 'auth.verify-email'
        $response->assertViewIs('auth.verify-email');

        //  Удаляем пользователя из базы данных
        $user->delete();
    }

    //  Проверка успешного подтверждения email
    public function testSuccessfulEmailConfirmation()
    {
        //  Создаем пользователя с помощью фабрики
        $user = User::factory()->create([
            'first_name' => 'Иван',
            'middle_name' => 'Иванович',
            'last_name' => 'Иванов',
            'password' => '123456789',
            'phone' => '+7945734567',
            'email_verified_at' => null,
        ]);

        //  Авторизуемся от имени данного пользователя
        $this->actingAs($user)->post(route('login'));

        //  Генерируем подписанную ссылку для подтверждения email
        $url = URL::temporarySignedRoute(
            'verification.verify',
            now()->addMinutes(60),
            [
                'id' => $user->id,
                'hash' => sha1($user->getEmailForVerification()),
            ]
        );

        //  Выполняем GET-запрос на маршрут с использованием сгенерированной ссылки
        $response = $this->get($url);

        //  Утверждаем, что ответ имеет статус 302 (перенаправление)
        $response->assertStatus(302);

        //  Утверждаем, что произошло перенаправление на маршрут RouteServiceProvider::HOME
        $response->assertRedirect(RouteServiceProvider::HOME);

        //  Обновляем модель пользователя из базы данных
        $user->refresh();

        //  Утверждаем, что email пользователя был подтвержден
        $this->assertNotNull($user->email_verified_at, 'Email was not verified.');

        //  Удаляем пользователя из базы данных
        $user->delete();
    }
}
