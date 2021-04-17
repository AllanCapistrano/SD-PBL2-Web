<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class HistoricSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Historic::factory(40)->create();
    }
}
