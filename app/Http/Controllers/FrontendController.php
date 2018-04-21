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
use App\Couple;
use Carbon\Carbon;

class FrontendController extends Controller
{
    public function __construct() {
        $this->postInstance = new PostsController();
        $this->carouselInstance = new CarouselImagesController();
    }

    public function home() {
		$page = Page::find(1);
        $carousel = $page->carousel;
		$slides = $carousel->images;

		$posts = Post::latest()
					->where('page_id', 1)
					->filter(request(['month', 'year']))
					->get();
			
		$archives = Post::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')
								->groupBy('year', 'month')
								->orderByRaw('min(created_at) desc')
								->where('page_id', 1)
								->get()
								->toArray();
		$postCount = Post::where('page_id', 1)->count();
        
        return view('frontend.home', compact('posts', 'page', 'slides', 'archives', 'postCount'));
    }

    public function about() {
		$couple = Couple::all();
        return view('frontend.about', compact('couple'));
    }

    public function gallery() {
        $albums = Album::filterId(request(['album']))->get();

        return view('frontend.gallery', compact('albums'));
    }
}
