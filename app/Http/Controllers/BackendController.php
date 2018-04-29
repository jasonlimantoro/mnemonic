<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class BackendController extends Controller
{
    public function admin()
    {
        return view('backend.admin');
    }

    public function general() {
        return view('backend.settings.general');
    }

    public function site() {
        return view('backend.settings.site-info');
    }

    public function social() {
        return view('backend.settings.social-media-and-seo');
    }

    public function manageAdmin() {
        return view('backend.settings.manage-admin');
    }

    public function manageRoles() {
        return view('backend.settings.manage-roles');
	}

}
