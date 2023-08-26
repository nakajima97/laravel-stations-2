<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReservationRequest;
use App\Models\Reservation;
use App\Models\Schedule;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::all();

        return view('admin.reservations.index', ['reservations' => $reservations]);
    }

    public function create()
    {
        return view('admin.reservations.create');
    }

    public function store(ReservationRequest $request)
    {
        $schedule = Schedule::find($request->schedule_id);
        $movie_id = $schedule->movie->id;

        $duplicate_reservation = Reservation::where('sheet_id', $request->input('sheet_id'))->where('schedule_id', $request->input('schedule_id'))->get();

        if ($duplicate_reservation->count() > 0) {
            return redirect()->route('admin.reservations.index', ['movie_id' => $movie_id, 'schedule_id' => $request->input('schedule_id'), 'date' => $request->input('date')])->with(['flash_message' => 'その座席はすでに予約済みです']);
        }

        Reservation::create($request->all());

        return redirect()->to(route('admin.reservations.index'));
    }
}
