<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpMqtt\Client\Facades\MQTT;

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

    public function refresh(Request $request)
    {
        $this->publish();

        return redirect()->back();
    }
    
    /**
     * Função responsável por publicar o estado da lâmpada para o tópico.
     * @param bool        $ledControl
     */
    private function publish()
    {
        $mqtt = MQTT::connection();
        $mqtt->publish('historicInTopic', 'refresh');
    }
}
