<?php

namespace App\Http\Controllers\Admin;

use App\Models\Movie;
use App\Models\Schedule;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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

    public function create($id)
    {
        return view('admin.schedules.create', ['id' => $id]);
    }

    public function store(Request $request)
    {
        $movie = Movie::find($request->id);

        if ($movie === null) {
            abort(404);
        }

        Schedule::create([
            'movie_id' => $movie->id,
            'start_time' => $request->input('start_time_date') . ' ' . $request->input('start_time_time'),
            'end_time' => $request->input('end_time_date') . ' ' . $request->input('end_time_time'),
        ]);

        return redirect()->route('admin.schedules.index');
    }
}
