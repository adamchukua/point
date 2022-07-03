<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HotelsController extends Controller
{
    public function index()
    {
        return view('hotels.index');
    }

    public function hotels()
    {
        return view('hotels.hotels');
    }
}
