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

    /**
     *  Função que define um novo timer.
     * @param TimerRequest $request
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
            $timerPublish = $this->formatTimer($request->timer);

            $this->publish($ledControl, $timerPublish);

            $status = $this->validateSetTimer();

            if($status == "success"){
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

    /**
     * Função responsável por formatar o temporizador.
     * @param string      $time
     * @return string
     */
    private function formatTimer($time)
    {
        $temp = explode(":", $time);
            
        if (count($temp) == 3){
            $timerFormated = $temp[0]."h".$temp[1]."m".$temp[2]."s";
        } else if (count($temp) == 2) {
            $timerFormated = $temp[0]."h".$temp[1]."m"."00s";
        }

        return $timerFormated;
    }

    /**
     * Função responsável por publicar o temporizzador para o tópico.
     * @param bool        $ledControl
     * @param string      $timerPublish
     */
    private function publish($ledControl, $timerPublish)
    {
        $mqtt = MQTT::connection();
        $mqtt->publish('timerInTopic', '{"LED_Control": '.$ledControl.', "time": '.$timerPublish.',}');
    }
    
    /**
     * Função responsável por validar se a ação foi realiada com sucesso.
     * @return string
     */
    private function validateSetTimer()
    {
        $mqtt = MQTT::connection();

        $mqtt->subscribe('timerOutTopic', function (string $topic, string $message, bool $retained) use ($mqtt) {
            $this->message = $message;
            
            $mqtt->interrupt();
        }, 0);

        $mqtt->loop(true);
        $mqtt->disconnect();

        return $this->message;
    }
}
