<?php

namespace App\Http\Controllers\Admin;

use App\Models\Movie;
use App\Models\Schedule;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreScheduleRequest;
use Carbon\Carbon;

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

    public function store(StoreScheduleRequest $request, $movie_id)
    {
        $movie = Movie::find($movie_id);

        if ($movie === null) {
            abort(404);
        }

        $start_time = Carbon::parse($request->input('start_time_date') . $request->input('start_time_time'));
        $end_time = Carbon::parse($request->input('end_time_date') . $request->input('end_time_time'));

        // 開始時刻 < 終了時刻
        if ($end_time->lt($start_time)) {
            return redirect()->route('admin.movies.schedules.create', $movie_id)->with('flash_message', '終了時刻が開始時刻の前になっています。');
        }

        // 差が５分未満
        if ($end_time->diffInMinutes($start_time) < 5) {
            return redirect()->route('admin.movies.schedules.create', $movie_id)->with('flash_message', '差が５分未満です。');
        }

        Schedule::create([
            'movie_id' => $movie->id,
            'start_time' => $request->input('start_time_date') . ' ' . $request->input('start_time_time'),
            'end_time' => $request->input('end_time_date') . ' ' . $request->input('end_time_time'),
        ]);

        return redirect()->route('admin.movies.show', $movie->id);
    }

    public function edit($scheduleId)
    {
        $schedule = Schedule::find($scheduleId);

        if ($schedule === null) {
            abort(404);
        }

        return view('admin.schedules.edit', ['schedule' => $schedule]);
    }

    public function update(StoreScheduleRequest $request, $id)
    {
        $schedule = Schedule::find($id);

        $schedule->start_time = $request->input('start_time_date') . ' ' . $request->input('start_time_time');
        $schedule->end_time = $request->input('end_time_date') . ' ' . $request->input('end_time_time');
        $schedule->save();

        return redirect()->route('admin.schedules.index');
    }

    public function destroy($id)
    {
        $schedule = Schedule::find($id);

        if ($schedule === null) {
            abort(404);
        }

        $schedule->delete();

        return redirect()->route('admin.schedules.index');
    }
}
