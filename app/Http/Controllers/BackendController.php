<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\PagesController;
use App\Page;
use App\Http\Controllers\ImagesController;
use App\Http\Controllers\CarouselController;
use App\Http\Controllers\AlbumsController;

use Illuminate\Support\Facades\DB;

class BackendController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.admin');
    }

    public function showPage (Page $page) {
        $pageInstance = new PagesController();
        return $pageInstance->show($page);
    }

    public function carousel() {
        $carouselInstance = new CarouselImagesController();
        return $carouselInstance->index(1);
    }

    public function gallery() {
        $imageInstance = new ImagesController();
        return $imageInstance->index();
    }

    public function album(){
        $albumInstance = new AlbumsController();
        return $albumInstance->index();
    }

    public function couple() {
        return view('backend.wedding.groom-and-bride');
    }

    public function event() {
        return view('backend.wedding.event');
    }

    public function brides() {
        return view('backend.wedding.bridesmaid-and-bestman');
    }

    public function vendors() {
        return view('backend.wedding.vendors');
    }

    public function rsvp() {
        return view('backend.wedding.rsvp');
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
