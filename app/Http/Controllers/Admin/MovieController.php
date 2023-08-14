<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminMovieStoreRequest;
use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\isNull;

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

    public function store(AdminMovieStoreRequest $request)
    {
        $movie = new Movie();
        $movie->title = $request->input('title');
        $movie->image_url = $request->input('image_url');
        $movie->published_year = $request->input('published_year');
        $movie->is_showing = $request->input('is_showing') === "1" ? true : false;
        $movie->description = $request->input('description');

        $genre_name = $request->input('genre');
        $genre = Genre::where('name', $genre_name)->first();

        $genre_id = null;
        if ($genre !== null) {
            $genre_id = $genre->id;
        }

        DB::transaction(function() use ($genre_id, $genre_name, $movie) {
            if ($genre_id === null) {
                $genre = new Genre();
                $genre->name = $genre_name;
                $genre->save();
                $genre_id = $genre->id;
            }

            $movie->genre_id = $genre_id;
            $movie->save();
        });

        return redirect()->route('admin.movies.index');
    }

    public function edit($id)
    {
        $movie = Movie::find($id);
        return view('admin.movies.edit', ['movie' => $movie]);
    }

    public function update(AdminMovieStoreRequest $request, $id)
    {
        $movie = Movie::find($id);

        if (!$movie) {
            return redirect()->route('admin.movies.index')->with(['flash_message' => '存在しない映画です。']);
        }

        $movie->update($request->all());

        return redirect()->route('admin.movies.index')->with(['flash_message' => '更新に成功しました。']);
    }

    public function destroy($id)
    {
        $movie = Movie::find($id);

        if (!$movie) {
            abort(404);
        }

        $movie->delete();

        return redirect()->route('admin.movies.index')->with(['flash_message' => '削除に成功しました。']);
    }
}
