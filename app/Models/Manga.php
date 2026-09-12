<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\AsArrayObject;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Manga extends Model
{
    /** @use HasFactory<\Database\Factories\MangaFactory> */
    use HasFactory;

    public $incrementing = false;

    protected $casts = [
        'genres' => AsArrayObject::class,
    ];

    public function staff(): HasMany
    {
        return $this->hasMany(Staff::class);
    }

    public function characters(): HasMany
    {
        return $this->hasMany(Character::class);
    }

    public function readings(): HasMany
    {
        return $this->hasMany(Reading::class);
    }
}
