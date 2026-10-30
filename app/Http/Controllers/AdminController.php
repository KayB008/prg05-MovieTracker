<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Movie;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    function index(Request $request)
    {
        abort_unless($request->user()->role === 'admin', 403);

        $users = User::orderBy('name')->get();
        $movies = Movie::orderBy('title')->get();

        return view('admin.index', compact('users', 'movies'));
    }

    function toggleAdmin(Request $request, User $user)
    {
        abort_unless($request->user()->role === 'admin', 403);

        // Voorkom dat een admin zichzelf demote
        abort_if($request->user()->id === $user->id, 403);

        $user->role = $user->role === 'admin' ? 'user' : 'admin';
        $user->save();

        return redirect()->route('admin.index')
            ->with('success', 'Gebruikersrol aangepast.');
    }
}
