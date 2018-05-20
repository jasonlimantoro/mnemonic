<?php

namespace App\Http\Controllers;

use JavaScript;
use App\Page;
use App\Album;
use App\Event;
use App\Couple;
use App\Vendor;
use App\BridesBest;
use Carbon\Carbon;
use App\Repositories\Posts;

class FrontendController extends Controller
{
    public function home(Posts $posts)
    {
        $page = Page::find(1);
        $carousel = $page->carousel;
        $slides = $carousel->images;

        $posts = $posts
                    ->home()
                    ->filter(request(['month', 'year']))
                    ->get();

        return view('frontend.home', compact('posts', 'page', 'slides'));
    }

    public function about()
    {
        $couple = Couple::all();
        return view('frontend.about', compact('couple'));
    }

    public function gallery()
    {
        $albums = Album::filterId(request(['album']))->get();

        return view('frontend.gallery', compact('albums'));
    }

    public function wedding()
    {
        $events = Event::all();
        $groom = Couple::groom();
        $bride = Couple::bride();
        $bbs = BridesBest::all();
        $vendors = Vendor::all();

        return view('frontend.wedding', compact('events', 'groom', 'bride', 'bbs', 'vendors'));
    }

    public function onlineRSVP()
    {
		$wedding = Event::byName('wedding');
		$weddingDate = Event::getDateTimeObjectAttribute($wedding->datetime);
		$isFuture = Carbon::now()->diffInSeconds($weddingDate, false) > 0;

		$rsvp = request()->session()->get('rsvp', null);
		JavaScript::put([
			'weddingDate' => $weddingDate,
			'rsvp' => $rsvp,
		]);
        return view('frontend.online-rsvp', compact('wedding', 'isFuture'));
    }
}
