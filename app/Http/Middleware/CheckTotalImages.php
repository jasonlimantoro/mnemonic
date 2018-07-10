<?php

namespace App\Http\Middleware;

use App\Repositories\Images;

class CheckTotalImages extends CheckPackageSettings
{

    public function allowed()
    {
        return (int) $this
            ->settings
            ->getValueByKey('resources-limit')
            ->total_images;
    }

    public function current()
    {
        return Images::all()->total();
    }
}
