<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class ContactsController extends Controller
{
    public function index(): View
    {
        return view('contacts.index');
    }

    public function sendMessage(Request $request)
    {
        //логика отправки
        
        return redirect()->back()->with('success', 'Ваше сообщение успешно отправлено!');
    }
}
