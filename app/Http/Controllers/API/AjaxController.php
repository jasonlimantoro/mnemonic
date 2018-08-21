<?php

namespace App\Http\Controllers\API;

use App\Traits\UploadsImage;
use App\Http\Controllers\Controller;


class AjaxController extends Controller
{
    use UploadsImage;

    public function __construct()
    {
        $this->middleware('package.images');
    }
}
