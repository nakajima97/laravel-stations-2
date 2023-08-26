<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReservationRequest;
use App\Models\Movie;
use App\Models\Reservation;
use App\Models\Schedule;
use App\Models\Sheet;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = DB::table('reservations')
            ->join('schedules', 'reservations.schedule_id', 'schedules.id')
            ->join('sheets', 'reservations.sheet_id', 'sheets.id')
            ->join('movies', 'schedules.movie_id', 'movies.id')
            ->where('movies.is_showing', 1)
            ->where('schedules.end_time', '>', Carbon::now())
            ->get();

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
            return redirect()->route('admin.reservations.index')->with(['flash_message' => 'その座席はすでに予約済みです']);
        }

        Reservation::create($request->all());

        return redirect()->to(route('admin.reservations.index'));
    }

    public function edit($id)
    {
        $reservation = Reservation::find($id);

        $sheets = Sheet::all();
        $schedules = Schedule::all();

        return view('admin.reservations.edit', ['reservation' => $reservation, 'sheets' => $sheets, 'schedules' => $schedules]);
    }

    public function update(ReservationRequest $request, $id)
    {
        $reservation = Reservation::find($id);

        if ($reservation === null) {
            abort(404);
        }

        $reservation->update($request->all());

        return redirect()->to(route('admin.reservations.index'));
    }

    public function destroy($id)
    {
        $reservation = Reservation::find($id);

        if ($reservation === null) {
            abort(404);
        }

        $reservation->delete();

        return redirect()->to(route('admin.reservations.index'));
    }
}
