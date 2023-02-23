<?php

namespace controllers;

use core\Request;
use models\User;

class LoginController
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        User::query()->where('email', '=', $request->input('email'))->where('password', '=', $request->input('password'))->first();
    }

}