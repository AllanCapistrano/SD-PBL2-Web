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

        $totalTimeOn = 0.0;
        $totalCons = 0.0;
        $totalPrice = 0.0;

        foreach ($historics as $historic) {
            $totalTimeOn += $historic->time_on;
            $totalCons += $historic->energy_cons;
            $totalPrice += $historic->price;
        }


        return view('historic', compact('historics', 'tariffs', 'totalTimeOn', 'totalCons', 'totalPrice'));
    }

    /*
    * Função que retorna a página de horários.
    */
    public function schedule(){
        return view('schedule');
    }
    
}
