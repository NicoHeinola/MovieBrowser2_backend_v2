<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserWatchSeason extends Model
{
    protected $fillable = [
        'season_id',
        'user_id',
        'show_id',
    ];

    /**
     * Get the season that is being watched.
     */
    public function season()
    {
        return $this->belongsTo(Season::class);
    }

    /**
     * Get the user that is watching.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the show that is being watched.
     */
    public function show()
    {
        return $this->belongsTo(Show::class);
    }
}
