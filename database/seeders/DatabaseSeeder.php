<?php

namespace Database\Seeders;

use App\Models\Movie;
use App\Practice;
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
        Practice::factory(10)->create();
        Movie::factory(100)->create();

        $this->call(SheetSeeder::class);
        $this->call(ScheduleSeeder::class);
    }
}
