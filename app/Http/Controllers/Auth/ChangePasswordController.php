<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    public function changePassword(Request $request): RedirectResponse
    {
        if (!(Hash::check($request->get('current_password'), Auth::user()->password))) {
            return redirect()->back()->with('error', 'Текущий пароль введен неверно.');
        }

        if (strcmp($request->get('current_password'), $request->get('new_password')) == 0) {
            return redirect()->back()->with('error', 'Новый пароль совпадает с текущим.');
        }

        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        $user = Auth::user();
        $user->password = Hash::make($request->get('new_password'));
        $user->save();

        return redirect()->back()->with('success', 'Пароль успешно изменен.');
    }
}
