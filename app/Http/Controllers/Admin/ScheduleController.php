<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index()
    {
        $movies = Movie::all();

        return view('admin.schedules.index', ['movies' => $movies]);
    }

    public function show($id)
    {
        $schedule = Schedule::find($id);

        if ($schedule === null) {
            abort(404);
        }

        return view('admin.schedules.show', ['schedule' => $schedule]);
    }
}
