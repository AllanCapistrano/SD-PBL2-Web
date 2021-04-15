<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\NodeMCU\Schedule;
use PhpMqtt\Client\Facades\MQTT;

class ShowSchedule extends Component
{
    public $begin;
    public $end;
    public $on;

    protected $rules = [
        'begin' => 'required',
        'end' => 'required',
    ];

    protected $messages = [
        'required' => 'Erro! É necessário preencher este(s) campo(s).',
    ];

    /**
     * Função para renderizar o componente.
     */
    public function render()
    {
        $schedules = Schedule::orderBy('id','desc')->get()->all();
        return view('livewire.show-schedule', ['schedules' => $schedules]);
    }

    /**
     * Função para criar um novo horário.
     */
    public function create(){
        $this->validate();
        
        if($this->on == 'true'){
            $on = 1;
            $ledControl = 0;
        } else{
            $on = 0;
            $ledControl = 1;
        }

        $begin = strtotime($this->begin);
        $end = strtotime($this->end);
        $diff = $begin - $end;

        if($diff >= 0){
            return redirect()->back()->with('error','O horário de início precisa ser menor que o horário de fim!');
        }

        $beginPublish = $this->formatTime($this->begin);
        $endPublish = $this->formatTime($this->end);

        $this->publish($ledControl, $beginPublish, $endPublish);

        $status = $this->validateCreateSchedule();

        if($status == "success"){
            Schedule::create([
                'begin' => $this->begin,
                'end' => $this->end,
                'on' => $on,
                'updated_at' => \Carbon\Carbon::now("America/Sao_Paulo"),
                'created_at' => \Carbon\Carbon::now("America/Sao_Paulo"),
            ]);
        } else {
            return redirect()->back()->with("error", "Falha ao executar a ação!");
        }

        
    }

    /**
     * Função para deletar um horário.
     */
    public function destroy($scheduleId){
    
        $schedule = Schedule::where('id', $scheduleId);

        $schedule->delete();
    }

    /**
     * Função responsável por formatar o horário.
     * @param string      $time
     * @return string
     */
    private function formatTime($time)
    {
        $temp = explode(":", $time);
            
        if (count($temp) == 3){
            $timeFormated = $temp[0]."h".$temp[1]."m".$temp[2]."s";
        } else if (count($temp) == 2) {
            $timeFormated = $temp[0]."h".$temp[1]."m"."00s";
        }

        return $timeFormated;
    }

    /**
     * Função responsável por publicar o temporizzador para o tópico.
     * @param bool        $ledControl
     * @param string      $beginPublish
     * @param string      $endPublish
     */
    private function publish($ledControl, $beginPublish, $endPublish)
    {
        $mqtt = MQTT::connection();
        $mqtt->publish('scheduleInTopic', '{"LED_Control": '.$ledControl.', "begin": '.$beginPublish.', "end": '.$endPublish.',}');
    }
    
    /**
     * Função responsável por validar se a ação foi realiada com sucesso.
     * @return string
     */
    private function validateCreateSchedule()
    {
        $mqtt = MQTT::connection();

        $mqtt->subscribe('scheduleOutTopic', function (string $topic, string $message, bool $retained) use ($mqtt) {
            $this->message = $message;
            
            $mqtt->interrupt();
        }, 0);

        $mqtt->loop(true);
        $mqtt->disconnect();

        return $this->message;
    }
}
