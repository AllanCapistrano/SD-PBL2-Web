<?php

namespace App\Http\Controllers\NodeMCU;

use App\Http\Controllers\Controller;
use App\Http\Requests\TimerRequest;
use App\Models\NodeMCU\Lamp;
use App\Models\NodeMCU\Timer;
use Illuminate\Http\Request;

class TimerController extends Controller
{
    /*
    * Função que define um novo timer.
    */
    public function setTimer(TimerRequest $request)
    {
        $request->validated();

        $timer = Timer::get()->first();
        $lamp = Lamp::get()->first();
        
        $timer->time = $request->timer;
        
        if($request->on == "on"){
            $timer->on = true;

            $lamp->on = true;
        }
        else{
            $timer->on = false;
            
            $lamp->on = false;
        }

        $timer->save();
        $lamp->save();

        $success = "Timer definido com sucesso!";
        return redirect()->back()->with('success-message', $success);
    }
}
