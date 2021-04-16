<?php

namespace App\Http\Controllers;

use App\Models\Historic;
use Illuminate\Http\Request;
use PhpMqtt\Client\Facades\MQTT;
use App\Models\Tariff;

class HistoricController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Função para atualizar o histórico
     */
    public function refresh()
    {
        
        $this->publish();
        
        $timeOn = floatval ($this->subscribe()); /*Colocar para horas. */
        /*60W foi a potência escolhida para a lâmpada.*/
        $energyCons = 60 * $timeOn; /*Consumo = Potência * Tempo */
        
        $date = \Carbon\Carbon::now("America/Sao_Paulo");
        $date = \Carbon\Carbon::parse($date)->format('Y-m');

        $historic = new Historic();
        $historic->energy_cons = $energyCons;
        $historic->time_on = $timeOn;
        $historic->price = $this->verifyTariff($date) * $energyCons;
        $historic->date = \Carbon\Carbon::parse(\Carbon\Carbon::now("America/Sao_Paulo"))->format('Y-m-d');

        $historic->save();

        return redirect()->back();
    }

    private function verifyTariff($date)
    {
        $date = $date."-01";

        $existTariff = Tariff::where('date', $date)->get()->first();
        
        if(isset($existTariff)) {
            return $existTariff->value;
        } else {
            $tariff = new Tariff();
            $tariff->value = 0.0;
            $tariff->date = $date;
            $tariff->save();

            return $tariff->value;
        }


    }
    
    /**
     * Função responsável por publicar o estado da lâmpada para o tópico.
     * @param bool        $ledControl
     */
    private function publish()
    {
        $mqtt = MQTT::connection();
        $mqtt->publish('historicInTopic', '{"Command": refresh,}');
    }

    /**
     * Função responsável por validar se a ação foi realiada com sucesso.
     * @return string
     */
    private function subscribe()
    {
        $mqtt = MQTT::connection();

        $mqtt->subscribe('historicOutTopic', function (string $topic, string $message, bool $retained) use ($mqtt) {
            $this->message = $message;
            
            $mqtt->interrupt();
        }, 0);

        $mqtt->loop(true);
        $mqtt->disconnect();

        return $this->message;
    }
}
