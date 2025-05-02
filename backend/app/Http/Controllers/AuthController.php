<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\PersonalAccessToken;

class AuthController extends Controller
{
    public function register(RegisterRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['admin'] = $request->has('admin') ? (bool)$request->input('admin') : false;
        $user = new User($validatedData);
        $user->save();

        return response()->json([
            'message' => 'Successful registration.',
            'user' => $user,
        ], 201);
    }

    public function login(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            $existingToken = $user->tokens()->where('name', 'access_token')->first();

            if ($existingToken) {
                $token = $existingToken->plainTextToken;
            } else {
                $token = $user->createToken('access_token')->plainTextToken;
            }

            return response()->json([
                'token' => $token,
                'user' => $user,
                'message' => 'Successful login',
            ], 200);
        }

        return response()->json([
            'message' => 'Invalid credentials',
        ], 401);
    }

    public function logout(Request $request)
    {
        $token = $request->bearerToken();
        if (!$token) {
            return response()->json(['message' => 'No token provided'], 401);
        }
        $accessToken = PersonalAccessToken::findToken($token);

        if (!$accessToken) {
            return response()->json(['message' => 'Invalid token'], 401);
        }

        // $user = $accessToken->tokenable;
        $accessToken->delete();

        return response()->json(['message' => 'Logged out successfully'], 200);
    }
}
