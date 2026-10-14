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
        $movie = new Movie();
        $movie->created_by_user_id = 1;
        $movie->title = 'karel';
        $movie->description = 'karel en zijn supervriendjes';
        $movie->release_year = 2023;
        $movie->poster_url = 'https://img.magnific.com/vrije-photo/grappige-kat-3d-illustratie_183364-80359.jpg?semt=ais_hybrid&w=740&q=80';
        $movie->save();

        return view('movie', compact('movie'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Movie $movie)
    {
        //
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
        //
    }
}
