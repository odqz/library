<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Staff extends Model
{
    /** @use HasFactory<\Database\Factories\StaffFactory> */
    use HasFactory;

    public function manga(): BelongsTo
    {
        return $this->belongsTo(Manga::class);
    }

    public function anime(): BelongsTo
    {
        return $this->belongsTo(Anime::class);
    }
}
