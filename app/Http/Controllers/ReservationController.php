<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Sheet;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function create(Request $request,$movie_id, $schedule_id)
    {
      $date = $request->query('date');
      $sheet_id = $request->query('sheet_id');

      return view('reservations.create', ['movie_id' => $movie_id, 'schedule_id' => $schedule_id, 'date' => $date, 'sheet_id' => $sheet_id]);
    }
}
