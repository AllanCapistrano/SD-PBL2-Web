<?php

namespace App\Http\Controllers;

use App\Models\Historic;
use Illuminate\Http\Request;
use App\Models\NodeMCU\Lamp;
use App\Models\Tariff;

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
        $historics = Historic::orderBy('id', 'desc')->paginate(30);
        $tariffs = Tariff::get();

        return view('historic', compact('historics', 'tariffs'));
    }

    /*
    * Função que retorna a página de horários.
    */
    public function schedule(){
        return view('schedule');
    }
    
}
