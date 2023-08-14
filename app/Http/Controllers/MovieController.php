<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Schedule;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isNull;

class MovieController extends Controller
{
    public function index(Request $request)
    {
        $query = Movie::query();

        $keyword = $request->input('keyword');
        if (!empty($keyword)) {
            $query->where('title', 'LIKE', '%' . $keyword . '%')
                ->orWhere('description', 'LIKE', '%' . $keyword . '%');
        }

        $is_showing = $request->input('is_showing');
        if ((!empty($is_showing) || $is_showing === '0') && $is_showing !== 'all') {
            $query->where('is_showing', $is_showing);
        }

        $movies = $query->paginate(20);
        return view('movies.index', ['movies' => $movies]);
    }

    public function show($id)
    {
        $movie = Movie::find($id);
        
        if (is_null($movie)) {
            abort(404);
        }

        $schedules = Schedule::where('movie_id', $movie->id)
            ->orderBy('start_time')
            ->get();

        return view('movies.show', ['movie' => $movie, 'schedules' => $schedules]);
    }
}
