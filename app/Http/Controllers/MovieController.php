<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Genre;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $validated = $request->validate([
            'search' => 'nullable|string|max:255',
            'genre' => 'nullable|integer|exists:genres,id'
        ]);

        $search = trim($validated['search'] ?? '');
        $selectedGenre = $validated['genre'] ?? null;

        $movies = Movie::with('genre')
            ->when($search, function ($query) use ($search) {
                $query->where(function ($query) use ($search) {
                    $query->where('title', 'like', "%{$search}%")
                        ->orWhere('description', 'like', "%{$search}%");
                });
            })
            ->when($selectedGenre, function ($query) use ($selectedGenre) {
                $query->where('genre_id', $selectedGenre);
            })
            ->get();

        $genres = Genre::orderBy('genre')->get();

        $greetings = 'Welcome on the Movies page';

        return view('movies.index', compact(
            'movies',
            'genres',
            'search',
            'selectedGenre',
            'greetings'
        ));
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

        // Zoek het genre of maak een nieuw genre aan
        $genre = Genre::firstOrCreate([
            'genre' => trim($request->input('genre'))
        ]);

        // Maak de film aan
        $movie = new Movie();
        $movie->created_by_user_id = Auth::user()->id;
        $movie->title = $request->input('title');
        $movie->description = $request->input('description');
        $movie->release_year = $request->input('release_year');
        $movie->poster_url = $request->input('poster_url');

        // Koppel het genre aan de film
        $movie->genre_id = $genre->id;

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
        Gate::authorize('update', $movie);

        return view('movies.edit', compact('movie'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Movie $movie)
    {
        Gate::authorize('update', $movie);

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'genre' => 'required|string|max:100',
            'release_year' => 'required|integer|min:0',
            'poster_url' => 'required|url'
        ]);

        $genre = Genre::firstOrCreate([
            'genre' => trim($request->input('genre'))
        ]);

        $movie->title = $request->input('title');
        $movie->description = $request->input('description');
        $movie->release_year = $request->input('release_year');
        $movie->poster_url = $request->input('poster_url');
        $movie->genre_id = $genre->id;

        $movie->save();

        return redirect()->route('movies.show', $movie);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Movie $movie)
    {
        Gate::authorize('delete', $movie);

        $movie->delete();

        return redirect()->route('movies.index');
    }
}
