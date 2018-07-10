<?php

namespace App\Http\Middleware;

use App\Repositories\Albums;

class CheckTotalAlbums extends CheckPackageSettings
{

    public function allowed()
    {
        return (int) $this
            ->settings
            ->getValueByKey('resources-limit')
            ->total_albums;
    }

    public function current()
    {
        return Albums::categorized()->count();
    }
}
