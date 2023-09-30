<?php

namespace App\Http\Controllers;

use App\Mail\ContactMessage;
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
        // Получаем данные из формы
        $data = $request->only([
            'name', 
            'phone', 
            'email', 
            'hotel', 
            'category', 
            'message'
        ]);

        // Отправляем сообщение на почту
        Mail::to('hello@example.com')->send(new ContactMessage($data));

        return redirect()->back()->with('success', 'Ваше сообщение успешно отправлено!');
    }
}
