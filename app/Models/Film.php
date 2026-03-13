<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'year',
        'genre',
        'country',
        'duration',
        'img_url',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'year' => 'integer',
        'duration' => 'integer',
    ];

    /**
     * The actors that belong to the film.
     */
    public function actors()
    {
        return $this->belongsToMany(Actor::class, 'films_actors');
    }
}
