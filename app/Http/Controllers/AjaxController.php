<?php

namespace App\Http\Controllers;

use App\Image;
use Illuminate\Http\Request;

class AjaxController extends Controller
{

    public function uploadAjax(Request $request)
    {
        $file = $request->file('vipImage');
        $file->storeAs('/', $file->getClientOriginalName(), 'uploads');

        $image = Image::firstOrCreate([
            'file_name' => $file->getClientOriginalName(),
            'url_asset' => url('uploads/' . $file->getClientOriginalName()),
            'url_cache' => url('/imagecache/vip/' . $file->getClientOriginalName()),
        ]);

        $response = [
            'message' => 'AJAX is successful!',
            'image' => $image,
        ];

        return \Response::json($response);
    }
}
