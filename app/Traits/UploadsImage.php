<?php

namespace App\Traits;

use App\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

    public function rename($old, $new)
    {
        if($old === $new) {
            return null;
        }

        Storage::disk('uploads')->move($old, $new);

        $this->update([
            'file_name' => $new,
            'url_asset' => url("uploads/${new}"),
            'url_cache' => url("imagecache/gallery/${new}"),
        ]);

        return $this;
    }

    public function deleteRecord()
    {
        Storage::disk('uploads')->delete($this->file_name);

        return $this->delete();
    }
}
