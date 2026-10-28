<?php

namespace App\Policies;

use App\Models\Movie;
use App\Models\User;

class MoviePolicy
{
    public function delete(User $user, Movie $movie): bool
    {
        return $this->update($user, $movie);
    }

    public function update(User $user, Movie $movie): bool
    {
        return $user->role === 'admin'
            || $user->id === (int)$movie->created_by_user_id;
    }
}
