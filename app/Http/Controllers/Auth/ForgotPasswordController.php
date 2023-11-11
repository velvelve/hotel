<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ForgotPasswordRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\ValidationException;

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
            return redirect()->route('password.request')->with('status', trans($status));
        }

        throw ValidationException::withMessages([
            'email' => [trans($status)],
        ])->redirectTo(route('password.request'));
    }

}
