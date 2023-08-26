<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReservationRequest;
use App\Models\Reservation;
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
        Reservation::create($request->all());

        return redirect()->to(route('admin.reservations.index'));
    }
}
