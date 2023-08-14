<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

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
}
