<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendHomeController extends Controller
{
    public function index()
    {
        return view('/home');
    }
}
