<?php

namespace controllers;

class HomeController extends Controller
{
    public function index()
    {
        return view('kaas');
    }
}