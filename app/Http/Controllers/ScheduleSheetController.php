<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Models\Sheet;
use Illuminate\Http\Request;

class ScheduleSheetController extends Controller
{
    public function index(Request $request, $movie_id, $schedule_id)
    {
        $schedule = Schedule::find($schedule_id);
        $date = $request->query('date');

        if ($schedule === null) {
            abort(404);
        }

        if ($date === null) {
            abort(400);
        }

        $sheet_map = Sheet::with(['reservations' => function($query) use ($schedule_id) {
            $query->where('schedule_id', $schedule_id);
        }])
        ->get()->mapToGroups(function ($item, $key) {
            return [$item['row'] => ['column' => $item['column'], 'id' => $item['id'], 'is_reservable' => $item['schedules']]];
        });

        // sheetを返した際にviewがいい感じに表示されるようにする
        $sheet = Sheet::with(['reservations' => function($query) use ($schedule_id) {
            $query->where('schedule_id', $schedule_id);
        }])
        ->get();

        dd($sheet);

        return view('schedules.sheets.index', ['sheet_map' => $sheet_map, 'movie_id' => $movie_id, 'schedule_id' => $schedule_id, 'date' => $date]);
    }
}