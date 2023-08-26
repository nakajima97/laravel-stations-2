<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReservationRequest;
use App\Models\Reservation;
use App\Models\Schedule;
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

      $reservation = Reservation::where('schedule_id', $schedule_id)->where('sheet_id', $sheet_id)->get();

      if (!$reservation->isEmpty()) {
        abort(400);
      }

      return view('reservations.create', ['movie_id' => $movie_id, 'schedule_id' => $schedule_id, 'date' => $date, 'sheet_id' => $sheet_id]);
    }

    public function store(ReservationRequest $request)
    {
      $schedule = Schedule::find($request->schedule_id);
      $movie_id = $schedule->movie->id;

      $duplicate_reservation = Reservation::where('sheet_id', $request->input('sheet_id'))->where('schedule_id', $request->input('schedule_id'))->get();
      
      if ($duplicate_reservation->count() > 0) {
        return redirect()->route('schedules.sheets.index', ['movie_id' => $movie_id, 'schedule_id' => $request->input('schedule_id'),'date' => $request->input('date')])->with(['flash_message' => 'その座席はすでに予約済みです']);
      }

      Reservation::create($request->validated());

      return redirect()->route('movies.show', ['id' => $movie_id]);
    }
}
