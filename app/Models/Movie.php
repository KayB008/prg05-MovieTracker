<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Movie extends Model
{
    function genre(): BelongsTo
    {
        return $this->belongsTo(Genre::class);
    }

    protected function casts(): array
    {
        return [
            'is_featured' => 'boolean',
        ];
    }
}
