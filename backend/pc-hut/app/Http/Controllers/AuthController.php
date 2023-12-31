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
            'address' => 'required|string|',
            'city' => 'required|string|',
            'postal' => 'required|string|',
            'password' => 'required|string', 'confirmed', Password::min(6),
            'email' => 'required|string|email|unique:user,email',
        ]);

        $user = User::create([
            'name' => $data['name'],
            'surname' => $data['surname'],
            'password' => bcrypt($data['password']),
            'email' => $data['email'],
            'address' => $data['address'],
            'city' => $data['city'],
            'postal' => $data['postal'],
        ]);

        $token = $user->createToken('main')->plainTextToken;

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

    public function getLoggedUser(Request $request)
    {
        return $request->user();
    }

    public function logout()
    {
        $user = Auth::user();
        $user->currentAccessToken()->delete();
        return response(['success' => true]);
    }
}
