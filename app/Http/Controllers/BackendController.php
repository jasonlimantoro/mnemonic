<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;
use App\Carousel;
use App\Couple;
use App\Repositories\Images;
use App\Repositories\Albums;

use App\Http\Controllers\PostsController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ImagesController;
use App\Http\Controllers\CarouselController;
use App\Http\Controllers\AlbumsController;
use App\Http\Controllers\CoupleController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\BridesBestsController;
use \App\Http\Controllers\VendorsController;

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

    public function page(Page $page) {
        $postInstance = new PostsController();
        return $postInstance->index($page);
    }

    public function carousel(Carousel $carousel) {
        $carouselInstance = new CarouselImagesController();
        return $carouselInstance->index($carousel);
    }

    public function gallery(Images $images) {
        $imageInstance = new ImagesController($images);
        return $imageInstance->index();
    }

    public function album(Albums $albums){
        $albumInstance = new AlbumsController($albums);
        return $albumInstance->index();
    }

    public function couple() {
        $coupleInstance = new CoupleController;
        return $coupleInstance->edit();
    }

    public function event() {
		$eventInstance = new EventsController;
        return $eventInstance->index();
    }

    public function brides_best() {
		$bridesBestInstance = new BridesBestsController;
        return $bridesBestInstance->index(); 
    }

    public function vendors() {
		$vendorsInstance = new VendorsController;
        return $vendorsInstance->index(); 
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
