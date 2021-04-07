<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NodeMCU\Lamp;

class HomeController extends Controller
{
    public function index()
    {
        $lamp = Lamp::get()->first();

        return view('home', compact('lamp'));
    }

    public function historic(){
        return view('historic');
    }

    public function schedule(){
        return view('schedule');
    }
    
}
