<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        if ($users->count() > 0) {
            $data = [
                'status' => 200,
                'users' => $users
            ];

            return response()->json($data, 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => "No users"
            ], 404);
        }
    }

    public function show($id)
    {
        $user = User::find($id);

        if ($user) {
            return response()->json([
                'status' => 200,
                'user' => $user
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => "No user found"
            ], 404);
        }
    }

    public function update(Request $request, int $id)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required|integer',
            'name' => 'required|string',
            'surname' => 'required|string',
            'address' => 'required|string',
            'city' => 'required|string',
            'postal' => 'required|string',
            'email' => Rule::unique('users')->ignore($id)
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages()
            ], 422);
        } else {
            $user = User::find($id);
            if ($user) {
                $user->update([
                    'name' => $request->name,
                    'surname' => $request->surname,
                    'address' => $request->address,
                    'city' => $request->city,
                    'postal' => $request->postal,
                    'email' => $request->email,
                ]);
                return response()->json([
                    'status' => 200,
                    'message' => 'User updated successfully',
                    'data' => $user
                ], 200);
            } else {
                return response()->json([
                    'status' => 404,
                    'message' => 'No user found'
                ], 404);
            }
        }
    }
}
