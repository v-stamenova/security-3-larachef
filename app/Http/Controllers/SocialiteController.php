<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Fortify\Rules\Password;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;
use function PHPUnit\Framework\isNull;

class SocialiteController extends Controller
{
    public function redirectToProvider($provider): RedirectResponse
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider)
    {
        $user = Socialite::driver($provider)->user();

        $searchedUser = User::where('provider_id', $user->id)
            ->where('provider', $provider)->first();
        if (!$searchedUser) {
            $searchedUser = User::create([
                'name' => $user->name,
                'email' => $user->email,
                'provider' => $provider,
                'provider_id' => $user->id,
                'password' => Hash::make(Str::random(10)),
            ]);
        }
        Auth::login($searchedUser);

        return redirect(route('welcome'));
    }
}
