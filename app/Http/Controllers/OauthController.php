<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Oauth;
use App\Models\Provider;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;


class OauthController extends Controller
{
    public function OAuthRedirect(Provider $provider){
        return Socialite::driver($provider->name)->redirect();
    }

    public function OAuthCallBack(Provider $provider){
        $oauthUser = Socialite::driver($provider->name)->user();
        $oauth = Oauth::where([
            "id" => $oauthUser->id,
            "provider_id" => $provider->id
        ])->first();

        if($oauth){
            Auth::login($oauth->user);
            return redirect("/dashboard");
        }
        $name = $oauthUser->name ?? $oauthUser->nickname;
        $user = User::Create([
            'name' => $name,
        ]);

        $oauth = Oauth::Create([
            "id" => $oauthUser->id,
            "user_id" => $user->id,
            "provider_id" => $provider->id,
            "provider_token" => $oauthUser->token,
            "provider_refresh_token" => $oauthUser->refreshToken,
        ]);

        Auth::login($user);

        return redirect('/dashboard');
    }

}
