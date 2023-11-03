<?php

namespace App\Services;

use Laravel\Socialite\Contracts\User as SocialUser;

interface Social
{
    public function loginAndGetRedirectUrl(SocialUser $socialUser): string;
}
