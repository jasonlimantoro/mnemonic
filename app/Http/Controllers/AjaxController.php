<?php

namespace App\Http\Controllers;

use App\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class AjaxController extends Controller
{
    public function __construct()
    {
        $this->middleware('package.images');
    }

    public function upload(Request $request)
    {

        $file = $request->file('image');
        $file->storeAs('/', $file->getClientOriginalName(), 'uploads');
        $template = $request->template ?: 'original';

        $image = Image::firstOrCreate([
            'file_name' => $file->getClientOriginalName(),
            'url_asset' => url('uploads/' . $file->getClientOriginalName()),
            'url_cache' => url("/imagecache/{$template}/{$file->getClientOriginalName()}"),
        ]);

        $response = [
            'message' => 'Upload success',
        ];

        if ($request->ajax()){
            return Response::json($response);
        }

        return $image;
    }
}
