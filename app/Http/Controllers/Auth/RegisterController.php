<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterAuthRequest;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    public function index(): View
    {
        return view('auth.register'); //возвращает шаблон с формой регистрации
    }

    public function create(RegisterAuthRequest $request): Redirector|RedirectResponse
    {
        $request->validate([
            'first_name' => ['required', 'string'],
            'last_name' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'unique:users'],
            'tel' => ['required'],
            'password' => ['required', 'confirmed', 'min:8']
        ]);

        //этот код правит косяк с автоинкрементом (прикол psql)
        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->tel,
            'password' => $request->password
        ]);
        event(new Registered($user));

        Auth::login($user);

        return redirect('/'); //после авторизации редирект сюда
    }
}
