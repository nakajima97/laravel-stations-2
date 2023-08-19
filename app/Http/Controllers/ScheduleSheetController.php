<?php

namespace App\Http\Controllers;

use App\Models\Sheet;
use Illuminate\Http\Request;

class ScheduleSheetController extends Controller
{
    public function index($movie_id, $schedule_id)
    {
        $sheet_map = Sheet::all()->mapToGroups(function ($item, $key) {
            return [$item['row'] => $item['column']];
        });

        return view('schedules.sheets.index', ['sheet_map' => $sheet_map]);
    }
}