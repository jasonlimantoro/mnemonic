<?php

namespace App\Traits;

use App\Image;
use Illuminate\Http\Request;

trait UploadsImage
{

    public static function upload(Request $request)
    {

        $file = $request->file('image');

        $name = $file->getClientOriginalName();

        $file->storeAs('/', $name, 'uploads');

        $template = $request->template ?: 'original';

        $image = Image::firstOrCreate([
            'file_name' => $name ,
            'url_asset' => url('uploads/' . $name),
            'url_cache' => url("/imagecache/{$template}/{$name}"),
        ]);

        if ($request->ajax()){
            return response()->json([
                'message' =>'Upload success'
            ]);
        }

        return $image;
    }
}
