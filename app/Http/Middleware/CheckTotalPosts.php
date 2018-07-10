<?php

namespace App\Http\Middleware;

use App\Repositories\Posts;

class CheckTotalPosts extends CheckPackageSettings
{

    public function allowed()
    {
        return (int) $this
            ->settings
            ->getValueByKey('resources-limit')
            ->total_posts;
    }

    public function current()
    {
        return Posts::home()->count();
    }
}
