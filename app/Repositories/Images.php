<?php

namespace App\Repositories;

use App\Image;
use App\Album;

class Images
{
    public static function all()
    {
        return Image::where('imageable_type', Album::class)
                    ->with('imageable')
                    ->latest()
                    ->paginate(9);
    }

    public static function withAlbum()
    {
        return Image::where('imageable_type', 'App\Album');
    }

    public static function withoutAlbum()
    {
        return Image::where('imageable_type', '!=', 'App\Album');
    }
}
