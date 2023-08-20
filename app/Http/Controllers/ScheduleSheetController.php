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

        $sheet_map = Sheet::all()->mapToGroups(function ($item, $key) {
            return [$item['row'] => ['column' => $item['column'], 'id' => $item['id']]];
        });


        return view('schedules.sheets.index', ['sheet_map' => $sheet_map, 'movie_id' => $movie_id, 'schedule_id' => $schedule_id, 'date' => $date]);
    }
}