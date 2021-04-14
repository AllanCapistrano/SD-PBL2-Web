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
            //$this->on = 1;
            $on = 1;
            $ledControl = 0;
        } else{
            //$this->on = 0;
            $on = 0;
            $ledControl = 1;
        }

        $begin = strtotime($this->begin);
        $end = strtotime($this->end);
        $diff = $begin - $end;

        if($diff >= 0){
            return redirect()->back()->with('error','O horário de início precisa ser menor que o horário de fim!');
        }

        /*MQTT publish*/
        $temp = explode(":", $this->begin);
        $temp2 = explode(":", $this->end);
            
        if (count($temp) == 3){
            $beginPublish = $temp[0]."h".$temp[1]."m".$temp[2]."s";
            $endPublish = $temp2[0]."h".$temp2[1]."m".$temp2[2]."s";
        } else if (count($temp) == 2) {
            $beginPublish = $temp[0]."h".$temp[1]."m"."00s";
            $endPublish = $temp2[0]."h".$temp2[1]."m"."00s";
        }

        $mqtt = MQTT::connection();
        $mqtt->publish('scheduleInTopic', '{"LED_Control": '.$ledControl.', "begin": '.$beginPublish.', "end": '.$endPublish.',}');

        Schedule::create([
            'begin' => $this->begin,
            'end' => $this->end,
            'on' => $on,
            'updated_at' => \Carbon\Carbon::now("America/Sao_Paulo"),
            'created_at' => \Carbon\Carbon::now("America/Sao_Paulo"),
        ]);
    }

    /**
     * Função para deletar um horário.
     */
    public function destroy($scheduleId){
    
        $schedule = Schedule::where('id', $scheduleId);

        $schedule->delete();
    }
}
