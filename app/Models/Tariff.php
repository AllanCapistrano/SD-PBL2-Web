<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tariff extends Model
{
    use HasFactory;

    /**
     * Função responsável por verificar se a tarifa existe.
     * @param float $value
     * @param string $date
     * @return void
     */
    public static function verifyTariff($value, $date)
    {
        $existTariff = Tariff::where('date', $date)->get()->first();

        if(isset($existTariff)) { /*Se a tarifa existir */
            $existTariff->value = $value;

            $temp = explode('-', $date);
            $historics = Historic::where('date', 'like', '%'.$temp[1].'%')->get();

            foreach($historics as $historic) {
                $historic->price = $existTariff->value * $historic->energy_cons;
                
                $historic->save();
            }
            
            $existTariff->save();
        } else {
            $tariff = new Tariff();
            $tariff->value = $value;
            $tariff->date = $date;
            $tariff->save();
        }
    }
}
