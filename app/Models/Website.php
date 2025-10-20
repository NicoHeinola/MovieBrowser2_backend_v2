<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Website extends Model
{
    protected $fillable = [
        'url',
        'title',
        'icon',
        'description',
    ];

    /**
     * Get the tags for the website.
     */
    public function tags()
    {
        return $this->hasMany(WebsiteTag::class);
    }
}
