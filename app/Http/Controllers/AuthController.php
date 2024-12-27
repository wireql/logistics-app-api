<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    
    public function register(RegisterRequest $request) {
        $fields = $request->validated();

        $user = User::create($fields);

        $token = $user->createToken($fields['email']);

        return response()->json([
            "message" => "Регистрация прошла успешно.",
            "data" => [
                "token" => $token->plainTextToken
            ]
        ], 201);
    }

    public function login(LoginRequest $request) {
        $fields = $request->validated();

        $user = User::where('email', $fields['email'])->first();

        if(!$user || !Hash::check($fields['password'], $user->password)) {
            return response()->json([
                "message" => "Ошибка при авторизации.",
            ], 400);
        }

        $token = $user->createToken($fields['email']);
        
        return response()->json([
            "message" => "Авторизация прошла успешно.",
            "data" => [
                "user" => $user,
                "token" => $token->plainTextToken
            ]
        ], 200);
    }

    public function logout(Request $request) {
        $request->user()->tokens()->delete();
    }
    
}
