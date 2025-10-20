<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WebsiteTag extends Model
{
    protected $fillable = [
        'website_id',
        'name',
    ];

    /**
     * Get the website that owns the tag.
     */
    public function website()
    {
        return $this->belongsTo(Website::class);
    }
}
