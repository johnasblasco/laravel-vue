<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register()
    {
        return "Register";
    }

    public function login()
    {
        return "Login";
    }

    public function logout()
    {
        return "Logout";
    }
}
