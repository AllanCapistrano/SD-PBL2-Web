<?php

namespace App\Http\Livewire;

use Livewire\Component;
/* use App\Models\Schedule; */


class Schedule extends Component
{
    public $count = 0;
    /* public Schedule $schedule; */

    public function increment()
    {
        $this->count++;
    }
    
    public function render()
    {
        /* $schedules = \DB::select('select * from schedules'); */
        return view('livewire.schedule');
    }

    public function create($calledId){
        $this->validate();

        /* Comment::create([
            'content' => $this->content,
            'user_id' => \Auth::user()->id,
            'called_id' => $calledId,
            'updated_at' => \Carbon\Carbon::now("America/Sao_Paulo"),
            'created_at' => \Carbon\Carbon::now("America/Sao_Paulo"),
        ]); */
    }
}
