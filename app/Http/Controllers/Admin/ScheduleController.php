<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index()
    {
        $movies = Movie::all();

        return view('admin.schedules.index', ['movies' => $movies]);
    }
}
