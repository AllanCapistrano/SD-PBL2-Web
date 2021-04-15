<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(LampSeeder::class);
        $this->call(ScheduleSeeder::class);
        $this->call(TimerSeeder::class);
        $this->call(TariffSeeder::class);
    }
}
