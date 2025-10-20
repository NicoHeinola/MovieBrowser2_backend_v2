<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShowCategory extends Model
{
    protected $fillable = [
        'show_id',
        'name',
    ];

    /**
     * Get the show that owns the category.
     */
    public function show()
    {
        return $this->belongsTo(Show::class);
    }
}
