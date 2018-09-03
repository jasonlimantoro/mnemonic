<?php

namespace App\Http\Middleware;

use App\Models\RSVP;

class CheckTotalRSVP extends CheckPackageSettings
{

    public function allowed()
    {
        return (int) $this
            ->settings
            ->getValueByKey('resources-limit')
            ->total_rsvp;
    }

    public function current()
    {
        return RSVP::count();
    }
}
