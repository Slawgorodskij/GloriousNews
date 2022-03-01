<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{

    private function userVerification($user, $typeAuth)
    {
        $ownUser = User::query()
            ->where('id_in_soc', $user->getId())
            ->where('type_auth', $typeAuth)
            ->first();
        if (is_null($ownUser)) {
            $userEmail = User::query()
                ->where('email', $user->getEmail())
                ->first();
            if (is_null($userEmail)) {
                $ownUser = User::createUserSocial($user, $typeAuth);
            } else {
                $ownUser = User::updateUserSocial($userEmail, $user, $typeAuth);
            }
        }

        Auth::login($ownUser);
        return true;
    }

    /**
     * @param Request $request
     */
    public function loginSocial(Request $request)
    {
        if (Auth::id()) {
            return redirect()->route('home_all');
        }
        return Socialite::with($request['social'])->redirect();
    }

    public function responseVK()
    {
        $user = Socialite::driver('vkontakte')->user();
        $this->userVerification($user, 'vk');
        return redirect()->route('home_all');
    }

    public function responseFB()
    {
        $user = Socialite::driver('facebook')->user();
        $this->userVerification($user, 'fb');
        return redirect()->route('home_all');
    }
}
