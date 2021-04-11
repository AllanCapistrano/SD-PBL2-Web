<?php

namespace App\Http\Controllers\NodeMCU;

use App\Http\Controllers\Controller;
use App\Http\Requests\TimerRequest;
use App\Models\NodeMCU\Lamp;
use App\Models\NodeMCU\Timer;
use Illuminate\Http\Request;
use PhpMqtt\Client\Facades\MQTT;

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

        /*MQTT publish*/
        $temp = explode(":", $request->timer);
        $timerPublish = $temp[0]."h".$temp[1]."m".$temp[2]."s";

        $mqtt = MQTT::connection();
        $mqtt->publish('timerInTopic', '{"LED_Control": '.$lamp->on.', "time:" '.$timerPublish.'}');

        $timer->save();
        $lamp->save();

        $success = "Timer definido com sucesso!";
        return redirect()->back()->with('success-message', $success);
    }
}
