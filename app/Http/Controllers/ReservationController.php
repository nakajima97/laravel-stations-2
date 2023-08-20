<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReservationRequest;
use App\Models\Movie;
use App\Models\Reservation;
use App\Models\Sheet;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function create(Request $request,$movie_id, $schedule_id)
    {
      $date = $request->query('date');
      $sheet_id = $request->query('sheetId');

      if ($date === null || $sheet_id === null) {
        abort(400);
      }

      return view('reservations.create', ['movie_id' => $movie_id, 'schedule_id' => $schedule_id, 'date' => $date, 'sheet_id' => $sheet_id]);
    }

    public function store(ReservationRequest $request)
    {
      Reservation::create($request->validated());

      return redirect()->route('movies.show', ['id' => $request->movie_id]);
    }
}
