<?php

namespace App\Http\Controllers\NodeMCU;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NodeMCU\Lamp;
use PhpMqtt\Client\Facades\MQTT;

class LampController extends Controller
{
    /*
    * Função para ligar e desligar a lâmpada.
    */
    public function toggleLamp()
    {
        $lamp = Lamp::get()->first();
        
        $mqtt = MQTT::connection();
        $mqtt->publish('lampInTopic', '{"LED_Control": '.$lamp->on.',}');

        $message = "";
        
        $mqtt->subscribe('lampOutTopic', function (string $topic, string $message, bool $retained) use ($mqtt) {
                $this->message = $message;
                
            $mqtt->interrupt();
        }, 0);
    
        $mqtt->loop(true);
        $mqtt->disconnect();

        if($this->message == "success"){
            $lamp->on = !$lamp->on;
    
            $lamp->save();

            return redirect()->back();
        } else {
            return redirect()->back()->with("error-message", "Falha ao executar a ação!");
        }
    }
}
