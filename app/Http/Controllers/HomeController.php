<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NodeMCU\Lamp;

class HomeController extends Controller
{
    /*
    * Função que retorna a página principal.
    */
    public function index()
    {
        $lamp = Lamp::get()->first();

        return view('home', compact('lamp'));
    }

    /*
    * Função que retorna a página de histórico.
    */
    public function historic(){
        return view('historic');
    }

    /*
    * Função que retorna a página de horários.
    */
    public function schedule(){
        return view('schedule');
    }
    
}
