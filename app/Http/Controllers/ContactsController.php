<?php

namespace App\Http\Controllers;

use App\Http\Requests\Contacts\ContactsRequest;
use App\Services\MailService;
use Exception;
use Illuminate\View\View;

class ContactsController extends Controller
{
    public function index(): View
    {
        return view('contacts.index');
    }

    public function sendMessage(ContactsRequest $request, MailService $mailService)
    {

        //Временная логика для проверки заполненных в .env MAIL_USERNAME и MAIL_PASSWORD для корректной работы формы отправки сообщения
        if (is_null(env('MAIL_USERNAME')) || is_null(env('MAIL_PASSWORD'))) {
            return response()->json(['error' => 'In yours .env MAIL_USERNAME and MAIL_PASSWORD configurations are not registered. Try clearing the configuration and cache "php artisan config:clear", "php artisan cache:clear"'], 500);
        }

        // Получаем данные из формы
        $validatedData = $request->validated();

        try {
            // Отправляем сообщение на почту администратора
            $mailService->sentToAdmin($validatedData);
            return redirect()->back()->with('success', 'Ваше сообщение успешно отправлено!');
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
