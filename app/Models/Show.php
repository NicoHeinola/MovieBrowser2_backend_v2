<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Show extends Model
{
    protected $fillable = [
        'title',
        'description',
        'image',
        'folder_name',
    ];

    /**
     * Get the seasons for the show.
     */
    public function seasons()
    {
        return $this->hasMany(Season::class);
    }

    /**
     * Get the user show statuses for the show.
     */
    public function userShowStatuses()
    {
        return $this->hasMany(UserShowStatus::class);
    }

    /**
     * Get the categories for the show.
     */
    public function categories()
    {
        return $this->hasMany(ShowCategory::class);
    }

    /**
     * Get the full folder path for the show.
     */
    public function getFullFolderPath(): ?string
    {
        if (!$this->folder_name) {
            return null;
        }

        $showsFolder = Setting::get('shows_folder');
        if (!$showsFolder) {
            return null;
        }

        $fullPath = $showsFolder.'/'.$this->folder_name;

        return str_replace('\\', '/', $fullPath);
    }
}
