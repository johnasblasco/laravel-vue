<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Hash;
use Illuminate\Support\Facades\Hash as FacadesHash;

class AuthController extends Controller

{
    public function register(Request $request)
    {
        // REQUEST SETTINGS
        $field = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        // CREATE USER
        $response = User::create(
            $field
        );

        // HASH SANCTUM AFTER CREATING USER
        $token = $response->createToken($request->name);


        //  RETURN RESPONSE (PLAIN TEXT) 
        return [
            "user" => $response,
            "token" => $token->plainTextToken
        ];
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|',
        ]);

        $user = User::where('email', $request->email)->first();
        if (!$user || !FacadesHash::check($request->password, $user->password)) {
            return [
                'message' => 'Invalid Credentials'
            ];
        }

        $token = $user->createToken($user->name);

        return [
            "user" => $user,
            "token" => $token->plainTextToken
        ];
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        return [
            "message" => "Logged Out"
        ];
    }
}
