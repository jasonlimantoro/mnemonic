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

    public function uploadAjax(Request $request)
    {

        $file = $request->file('image');
        $file->storeAs('/', $file->getClientOriginalName(), 'uploads');
        $template = $request->template ?: 'original';

        Image::firstOrCreate([
            'file_name' => $file->getClientOriginalName(),
            'url_asset' => url('uploads/' . $file->getClientOriginalName()),
            'url_cache' => url("/imagecache/{$template}/{$file->getClientOriginalName()}"),
        ]);

        $response = [
            'message' => 'Upload success',
        ];

        return Response::json($response);
    }
}
