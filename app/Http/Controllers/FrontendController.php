<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\CarouselImagesController;
use App\Page;
use App\Post;
Use App\Carousel;
use App\Image;
use App\Album;

class FrontendController extends Controller
{
    public function __construct() {
        $this->postInstance = new PostsController();
        $this->carouselInstance = new CarouselImagesController();
    }

    public function home() {
        $page = Page::find(1);
        $posts = $page->posts()->latest()->get();
        $carousel = $page->carousel;
        $slides = $carousel->images;
        
        return view('frontend.home', compact('posts', 'page', 'slides'));
    }

    public function about() {
        $page = Page::find(2);
        $posts = $page->posts()->latest()->get();
        return view('frontend.about', compact('posts', 'page', 'slides'));
    }

    public function gallery() {
        $albums = Album::all();
        if ($id = request('album')){
            $albums = $albums->where('id', $id);
        }

        return view('frontend.gallery', compact('albums'));
    }
}
