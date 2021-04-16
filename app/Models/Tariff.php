<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tariff extends Model
{
    use HasFactory;

    public static function verifyTariff($value, $date)
    {
        $existTariff = Tariff::where('date', $date)->get()->first();

        /*Quando alterar a tarifa, vai ter que atualiazar todos os preços que estão
        relacionadas com a mesma. */
        if(isset($existTariff)) {
            $existTariff->value = $value;
            
            $existTariff->save();
        } else {
            $tariff = new Tariff();
            $tariff->value = $value;
            $tariff->date = $date;
            $tariff->save();
        }
    }
}
