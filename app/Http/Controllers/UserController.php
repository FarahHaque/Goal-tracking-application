<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        # code...
        return view('user_login');
    }
    public function login(Request $request)
    {
        # code...
    }
}

