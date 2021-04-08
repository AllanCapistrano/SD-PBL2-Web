<?php

namespace App\Http\Controllers\NodeMCU;

use App\Http\Controllers\Controller;
use App\Models\NodeMCU\Timer;
use Illuminate\Http\Request;

class TimerController extends Controller
{
    /*
    * Função que define um novo timer.
    */
    public function setTimer(Request $request)
    {
        $rules = [
            'timer' => 'required',
        ];

        $messages = [
            'required' => 'Erro! É necessário preencher este campo.',
        ];

        $request->validate($rules, $messages);

        $timer = Timer::get()->first();
        $timer->time = $request->timer;

        if($request->radioOn == "true")
            $timer->on = true;
        else
            $timer->on = false;

        $timer->save();

        $success = "Timer definido com sucesso!";
        return redirect()->back()->with('success-message', $success);
    }
}
