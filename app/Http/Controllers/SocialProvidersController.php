<?php

namespace App\Http\Controllers;

use App\Services\Social;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller;
use Illuminate\Routing\Redirector;
use Laravel\Socialite\Facades\Socialite;
use Laravel\Socialite\Two\InvalidStateException;
use Symfony\Component\HttpFoundation\RedirectResponse as SymfonyRedirectResponse;

final class SocialProvidersController extends Controller
{
    public function redirect(string $driver): SymfonyRedirectResponse|RedirectResponse
    {
        return Socialite::driver($driver)->redirect();
    }

    public function callback(string $driver, Social $social): Application|Redirector|RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        try {
            $socialite = Socialite::driver($driver)->user();
        } catch (InvalidStateException $e) {
            $socialite = Socialite::driver($driver)->stateless()->user();
        }

        return redirect(
            $social->loginAndGetRedirectUrl($socialite)
        );
    }
}
