<?php

namespace App\Traits;

use App\Models\Image;
use App\Repositories\Albums;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

trait UploadsImage
{

    public static function upload(Request $request, $uncategorized = true)
    {

        $file = $request->file('image');

        $name = $file->getClientOriginalName();

        $file->storeAs('/', $name, 'uploads');


        $image = Image::firstOrCreate([
            'name' => $name ,
            'url' => url('uploads/' . $name),
        ]);

        if ($uncategorized){
            $image->albums()->save(Albums::uncategorized());
        }

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

        return tap($this)->update([
            'name' => $new,
            'url' => url("uploads/${new}"),
        ]);
    }

    public function deleteRecord()
    {
        Storage::disk('uploads')->delete($this->name);

        return $this->delete();
    }
}
