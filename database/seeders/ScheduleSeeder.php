<?php

namespace Database\Seeders;

use App\Models\Movie;
use App\Models\Schedule;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 10; $i++) {
            $movie = Movie::find($i);

            if ($movie === null) {
                continue;
            }

            $start_time = Carbon::now();

            Schedule::create([
                'movie_id' => $movie->id,
                'start_time' => $start_time,
                'end_time' => $start_time->addHour(1)
            ]);
        }
    }
}
