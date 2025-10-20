<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    protected $fillable = [
        'season_id',
        'title',
        'description',
        'number',
        'type',
        'filename',
        'file_size_bytes',
    ];

    protected $casts = [
    ];

    /**
     * Get the season that owns the episode.
     */
    public function season()
    {
        return $this->belongsTo(Season::class);
    }

    /**
     * Get the full file path for the episode.
     */
    public function getFullFilePath(): ?string
    {
        $seasonFolderPath = $this->season->getFullFolderPath();

        if (!$seasonFolderPath || !$this->filename) {
            return null;
        }

        $fullFilePath = $seasonFolderPath.'/'.$this->filename;

        return str_replace('\\', '/', $fullFilePath);
    }
}
