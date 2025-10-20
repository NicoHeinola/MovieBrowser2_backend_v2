<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
    protected $fillable = [
        'show_id',
        'title',
        'description',
        'image',
        'number',
        'folder_name',
    ];

    protected $casts = [
    ];

    /**
     * Get the show that owns the season.
     */
    public function show()
    {
        return $this->belongsTo(Show::class);
    }

    /**
     * Get the episodes for the season.
     */
    public function episodes()
    {
        return $this->hasMany(Episode::class);
    }

    /**
     * Get the user watch seasons for the season.
     */
    public function userWatchSeasons()
    {
        return $this->hasMany(UserWatchSeason::class);
    }

    /**
     * Get the full folder path for the season.
     */
    public function getFullFolderPath(): ?string
    {
        if (!$this->folder_name) {
            return null;
        }

        $showFolderPath = $this->show->getFullFolderPath();

        if (!$showFolderPath) {
            return null;
        }

        $fullPath = $showFolderPath.'/'.$this->folder_name;

        return str_replace('\\', '/', $fullPath);
    }
}
