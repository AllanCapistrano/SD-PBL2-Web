<?php

namespace Database\Factories;

use App\Models\Historic;
use Illuminate\Database\Eloquent\Factories\Factory;

class HistoricFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Historic::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'energy_cons' => $this->faker->randomFloat(2, 0, 100),
            'time_on' => $this->faker->randomFloat(2, 0, 100),
            'price' => $this->faker->randomFloat(2, 0, 100),
            'date' => \Carbon\Carbon::now("America/Sao_Paulo"),
        ];
    }
}
