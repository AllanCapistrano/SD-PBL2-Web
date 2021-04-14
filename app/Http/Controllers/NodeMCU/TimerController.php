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

        $lampPrevious = $lamp->on;
        
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

        if($lampPrevious != $timer->on){
            /*MQTT publish*/
            $temp = explode(":", $request->timer);
            
            if (count($temp) == 3){
                $timerPublish = $temp[0]."h".$temp[1]."m".$temp[2]."s";
            } else if (count($temp) == 2) {
                $timerPublish = $temp[0]."h".$temp[1]."m"."00s";
            }
    
            $mqtt = MQTT::connection();
            $mqtt->publish('timerInTopic', '{"LED_Control": '.$ledControl.', "time": '.$timerPublish.',}');
    
            $message = "";
        
            $mqtt->subscribe('timerOutTopic', function (string $topic, string $message, bool $retained) use ($mqtt) {
                    $this->message = $message;
                    
                $mqtt->interrupt();
            }, 0);
        
            $mqtt->loop(true);
            $mqtt->disconnect();

            if($this->message == "success"){
                $timer->save();
                $lamp->save();

                $success = "Timer definido com sucesso!";
            
                return redirect()->back()->with('success-message', $success);
            } else {
                return redirect()->back()->with("error-message", "Falha ao executar a ação!");
            }
        }

        $status = ($lampPrevious) ? "Ligada!" : "Desligada!";

        $error = "A lâmpada já está ".$status;

        return redirect()->back()->with('error-message', $error);

    }
}
