<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserShowStatus extends Model
{
    protected $fillable = [
        'user_id',
        'show_id',
        'status',
    ];

    /**
     * Get the user that owns the status.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the show that owns the status.
     */
    public function show()
    {
        return $this->belongsTo(Show::class);
    }
}
