<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index()
    {
        $movies = Movie::all();
        return view('admin.movies.index', ['movies' => $movies]);
    }

    public function create()
    {
        return view('admin.movies.create');
    }

    public function store()
    {
        return redirect()->route('admin.movies.index');
    }
}
