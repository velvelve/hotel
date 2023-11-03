<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ForgotPasswordRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{
    public function index(): View
    {
        return view('auth.forgot-password'); //возвращает шаблон с формой восстановления пароля
    }

    public function store(ForgotPasswordRequest $request): RedirectResponse
    {
        $credentials = $request->validated();

        $status = Password::sendResetLink(
            $request->only('email')
        );

        if ($status === Password::RESET_LINK_SENT) {
            return back()->with('status', trans($status));
        }

        return back()->withInput($request->only('email'))->withErrors(['email' => trans($status)]);
    }

}
