<?php

namespace App\Http\Controllers;

use App\Traits\UploadsImage;

class AjaxController extends Controller
{
    use UploadsImage;

    public function __construct()
    {
        $this->middleware('package.images');
    }
}
