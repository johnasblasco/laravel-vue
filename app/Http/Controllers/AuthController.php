<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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

        //  RETURN RESPONSE
        return $response;
    }

    public function login(Request $request)
    {
        return "Login";
    }

    public function logout(Request $request)
    {
        return "Logout";
    }
}
