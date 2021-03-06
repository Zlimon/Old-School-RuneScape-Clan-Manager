<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $accessToken = $user->createToken('accessToken')->accessToken;

        return response()->json(['accessToken' => $accessToken], 200);
    }

    public function login(Request $request)
    {
        $login = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        if (!Auth::attempt($login)) {
            return response()->json('These credentials do not match our records.', 401);
        }

        $accessToken = Auth::user()->createToken('authToken')->accessToken;

        return response()->json($accessToken, 200);
    }

    public function user()
    {
        return response()->json(['user' => auth()->user()], 200);
    }
}
