<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Actions\Jetstream\DeleteUser;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        if (Auth::user()->hasRole('admin')) {
            $users = User::all();

            return view('users.index', compact('users'));
        }

        abort(403);
    }

    public function deleteUser(User $user)
    {
        if (Auth::user()->hasRole('admin')) {
            $user->delete();

            return redirect(route('admin.index'));
        }

        abort(403);

    }
}
