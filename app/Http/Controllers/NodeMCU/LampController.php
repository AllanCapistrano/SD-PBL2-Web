<?php

namespace App\Http\Controllers\NodeMCU;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NodeMCU\Lamp;

class LampController extends Controller
{
    public function toggleLamp()
    {
        $lamp = Lamp::get()->first();
        $lamp->on = !$lamp->on;

        $lamp->save();

        return redirect()->back();
    }
}
