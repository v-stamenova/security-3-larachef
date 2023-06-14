<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Retrieve the user by the provided email address
        $user = User::where('email', $request->email)->first();

        // Check if the user exists and the banned field has a specific value
        if ($user && $user->provider_id) {
            throw ValidationException::withMessages([
                'email' => __('There seems to be an issue with the credentials.'),
            ]);
        }

        // Use the default authentication process
        if (Auth::attempt($request->only('email', 'password'), $request->filled('remember'))) {
            $request->session()->regenerate();

            return redirect()->intended(route('welcome'));
        }

        throw ValidationException::withMessages([
            'email' => __('The provided credentials do not match our records.'),
        ]);
    }

}
