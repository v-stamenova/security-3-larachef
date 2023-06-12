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

class GithubController extends Controller
{
    public function redirectToGithub(): RedirectResponse
    {
        return Socialite::driver('github')->redirect();
    }

    public function handleGithubCallback()
    {

        $user = Socialite::driver('github')->user();

        $searchedUser = User::where('github_id', $user->id)->first();
        if (!$searchedUser) {
            $searchedUser = User::create([
                'name' => $user->name,
                'email' => $user->email,
                'github_id' => $user->id,
                'password' => Hash::make(Str::random(10)),
            ]);
        }
        Auth::login($searchedUser);

        return redirect(route('welcome'));
    }
}
