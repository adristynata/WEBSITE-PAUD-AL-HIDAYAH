<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    protected $table = 'galeris';

    protected $guarded = [];

    public function getYoutubeIdAttribute()
    {
        if (!$this->video_url) return null;
        if (preg_match('/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?|shorts)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/', $this->video_url, $matches)) {
            return $matches[1];
        }
        return null;
    }

    public function getEmbedUrlAttribute()
    {
        if ($this->video_url) {
            $youtubeId = $this->youtube_id;
            if ($youtubeId) {
                return "https://www.youtube.com/embed/{$youtubeId}?autoplay=1";
            }
            return $this->video_url;
        }
        if ($this->video_file) {
            return asset($this->video_file);
        }
        return null;
    }

    public function getThumbnailUrlAttribute()
    {
        if ($this->foto) {
            return asset($this->foto);
        }
        if ($this->youtube_id) {
            return "https://img.youtube.com/vi/{$this->youtube_id}/hqdefault.jpg";
        }
        return asset('images/gedung-sekolah.jpg');
    }
}
