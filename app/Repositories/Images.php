<?php

namespace App\Repositories;

use App\Models\Image;

class Images
{
    public static function all()
    {
        return Image::with('album')
                    ->latest()
                    ->paginate(9);
    }

    public static function withAlbum()
    {
        return Image::where('imageable_type', 'App\Models\Album');
    }

    public static function withoutAlbum()
    {
        return Image::where('imageable_type', '!=', 'App\Models\Album');
    }
}
