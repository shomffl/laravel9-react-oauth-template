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
    public function githubRedirect(){
        return Socialite::driver('github')->redirect();
    }

    public function githubCallBack(){
        $githubUser = Socialite::driver('github')->user();
        $oauth = Oauth::where([
            "id" => $githubUser->id,
            "provider_id" => 1
        ])->first();

        if($oauth){
            Auth::login($oauth->user);

            return redirect("/dashboard");
        }

        $user = User::Create([
            'name' => $githubUser->nickname,
        ]);

        $oauth = Oauth::Create([
            "id" => $githubUser->id,
            "user_id" => $user->id,
            "provider_id" => 1,
            "provider_token" => $githubUser->token,
            "provider_refresh_token" => $githubUser->refreshToken,
        ]);

        Auth::login($user);

        return redirect('/dashboard');
    }

    public function googleRedirect(){
        return Socialite::driver("google")->redirect();
    }

    public function googleCallBack(){
        $googleUser = Socialite::driver("google")->user();

        $oauth = Oauth::where([
            "id" => $googleUser->id,
            "provider_id" => 2
        ])->first();

        if($oauth){
            Auth::login($oauth->user);

            return redirect("/dashboard");
        }

        $user = User::Create([
            'name' => $googleUser->name,
        ]);

        $oauth = Oauth::Create([
            "id" => $googleUser->id,
            "user_id" => $user->id,
            "provider_id" => 1,
            "provider_token" => $googleUser->token,
            "provider_refresh_token" => $googleUser->refreshToken,
        ]);

        Auth::login($user);

        return redirect('/dashboard');
    }

}
