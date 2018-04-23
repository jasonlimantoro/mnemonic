<?php

namespace App\Http\Controllers;

use App\Page;
use App\Post;
use App\Image;
use App\Album;
use App\Event;
use App\Couple;
Use App\Carousel;
use Carbon\Carbon;
use App\Repositories\Posts;
use Illuminate\Http\Request;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\CarouselImagesController;

class FrontendController extends Controller
{
    public function home(Posts $posts) {
		$page = Page::find(1);
        $carousel = $page->carousel;
		$slides = $carousel->images;
		
		$posts =$posts->home()
					->filter(request(['month', 'year']))
					->get();
			
        return view('frontend.home', compact('posts', 'page', 'slides'));
    }

    public function about() {
		$couple = Couple::all();
        return view('frontend.about', compact('couple'));
    }

    public function gallery() {
        $albums = Album::filterId(request(['album']))->get();

        return view('frontend.gallery', compact('albums'));
	}
	
	public function wedding()
	{
		$events = Event::all();
		$groom = Couple::groom();
		$bride = Couple::bride();

		return view('frontend.wedding', compact('events', 'groom', 'bride'));
	}

	public function onlineRSVP()
	{
			
	}
}
