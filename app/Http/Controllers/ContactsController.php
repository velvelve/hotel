<?php

namespace App\Http\Controllers;

use App\Mail\ContactMessage;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class ContactsController extends Controller
{
    public function index(): View
    {
        return view('contacts.index');
    }

    public function sendMessage(Request $request)
    {
        if (is_null(env('MAIL_USERNAME')) || is_null(env('MAIL_PASSWORD'))) {
            return response()->json(['error' => 'In yours .env MAIL_USERNAME and MAIL_PASSWORD configurations are not registered. Try clearing the configuration and cache "php artisan config:clear", "php artisan cache:clear"'], 500);
        }

        // Получаем данные из формы
        $data = $request->only([
            'name',
            'phone',
            'email',
            'hotel',
            'category',
            'message'
        ]);

        try {
            // Отправляем сообщение на почту
            Mail::to('hello@example.com')->send(new ContactMessage($data));
            return redirect()->back()->with('success', 'Ваше сообщение успешно отправлено!');
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
