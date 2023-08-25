<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|',
            'surname' => 'required|string|',
            'username' => 'required|string|unique:user,username',
            'password' => 'required|string', 'confirmed', Password::min(6),
            'email' => 'required|string|email|unique:user,email',
        ]);

        $user = User::create([
            'name' => $data['name'],
            'surname' => $data['surname'],
            'username' => $data['username'],
            'password' => bcrypt($data['password']),
            'email' => $data['email'],
        ]);

        $token = $user->createToken('main')->plainTextToken;


        //give this to frontend...mby just id is enough not the whole user
        return response([
            'user' => $user,
            'token' => $token,
        ]);
    }

    public function login(Request $request)
    {

        $credentials = $request->validate([
            'email' => 'required|email|string|exists:user,email',
            'password' => [
                'required',
            ],
            'remember' => 'boolean'
        ]);

        $remember = $credentials['remember'] ?? false;
        unset($credentials['remember']);

        if (!Auth::attempt($credentials, $remember)) {

            return response([
                'error' => 'Ovaj korisnik ne postoji'
            ], 422);
        }

        $user = Auth::user();
        $token = $user->createToken('main')->plainTextToken;

        return response([
            'user' => $user,
            'token' => $token,
        ]);
    }
}
