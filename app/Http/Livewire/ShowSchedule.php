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
        'on' => 'required',
    ];

    public function increment()
    {
        $this->count++;
    }

    public function render()
    {
        $schedules = Schedule::all();
        return view('livewire.show-schedule', ['schedules' => $schedules]);
    }

    public function create(){
        $this->validate();
        
        if($this->on == 'true'){
            $this->on = 0;
        } else{
            $this->on = 1;
        }

        Schedule::create([
            'begin' => $this->begin,
            'end' => $this->end,
            'on' => $this->on,
            'date' => '08/04/2021',
            'updated_at' => \Carbon\Carbon::now("America/Sao_Paulo"),
            'created_at' => \Carbon\Carbon::now("America/Sao_Paulo"),
        ]);
    }
}
