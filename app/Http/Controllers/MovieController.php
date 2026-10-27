<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $movies = Movie::all();


        $greetings = 'Welcome on the Movies page';
        return view('movies.index', compact('movies', 'greetings'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'genre' => 'required|string|max:100',
            'release_year' => 'required|integer|min:0',
            'poster_url' => 'required|url'
        ]);

        $movie = new Movie();
        $movie->created_by_user_id = 1;
        $movie->title = $request->input('title');
        $movie->description = $request->input('description');
        $movie->release_year = $request->input('release_year');
        $movie->genre = $request->input('genre');
        $movie->poster_url = $request->input('poster_url');

        $movie->save();

        return redirect()->route('movies.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('movies.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(Movie $movie)
    {
        return view('movies.show', compact('movie'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Movie $movie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Movie $movie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Movie $movie)
    {
        $movie->delete();
        return redirect()->route('movies.index');
    }
}
