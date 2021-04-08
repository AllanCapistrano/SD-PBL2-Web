<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\NodeMCU\Schedule;

class ShowSchedule extends Component
{
    public $count = 0;
    /* public Schedule $schedule; */
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

    public function increment()
    {
        $this->count++;
    }

    public function render()
    {
        $schedules = Schedule::orderBy('id','desc')->get()->all();
        return view('livewire.show-schedule', ['schedules' => $schedules]);
    }

    public function create(){
        $this->validate();
        
        dd($this->on);
        if($this->on == 'true'){
            $this->on = 1;
        } else{
            $this->on = 0;
        }

        Schedule::create([
            'begin' => $this->begin,
            'end' => $this->end,
            'on' => $this->on,
            'updated_at' => \Carbon\Carbon::now("America/Sao_Paulo"),
            'created_at' => \Carbon\Carbon::now("America/Sao_Paulo"),
        ]);
    }
}
