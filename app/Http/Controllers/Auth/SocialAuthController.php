<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Two\InvalidStateException;

class SocialAuthController extends Controller
{
    public function GoogleRedirect()
    {
        // return 456;
        return Socialite::driver('google')->redirect();
    }
    public function GoogleCallback()
    {
        $user = Socialite::driver('google')->user();

        $check = User::where([
            'email' => $user->email,
        ])->first();

        if ($check) {

            Auth::guard('user')->login($check);
            return redirect('/user/homeAuth');
        } else {
            dd(123);

            return redirect('/user/login')->with('error', 'Thất bại!');
        }
    }
}
