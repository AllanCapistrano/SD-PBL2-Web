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
            $ledControl = 0; // Por causa da lógica invertida do LED.
        }
        else{
            $timer->on = false;
            $lamp->on = false;
            $ledControl = 1; // Por causa da lógica invertida do LED.
        }

        /*MQTT publish*/
        $temp = explode(":", $request->timer);
        
        if (count($temp) == 3){
            $timerPublish = $temp[0]."h".$temp[1]."m".$temp[2]."s";
        } else if (count($temp) == 2) {
            $timerPublish = $temp[0]."h".$temp[1]."m"."00s";
        }

        $mqtt = MQTT::connection();
        $mqtt->publish('timerInTopic', '{"LED_Control": '.$ledControl.', "time": '.$timerPublish.',}');

        $timer->save();
        $lamp->save();

        $success = "Timer definido com sucesso!";
        return redirect()->back()->with('success-message', $success);
    }
}
