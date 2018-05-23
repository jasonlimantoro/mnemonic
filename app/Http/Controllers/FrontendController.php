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
use App\Setting;

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

    public function about(Posts $posts)
    {
		$posts = $posts->about()->get();
        return view('frontend.about', compact('posts'));
    }

    public function gallery()
    {
        return view('frontend.gallery');
    }

    public function wedding()
    {
		$embed = Setting::getValueByKey('embed-video');
        $events = Event::all();
        $groom = Couple::groom();
        $bride = Couple::bride();
        $bbs = BridesBest::all();
        $vendors = Vendor::all();

        return view('frontend.wedding', compact('embed', 'events', 'groom', 'bride', 'bbs', 'vendors'));
    }

    public function onlineRSVP()
    {
		$wedding = Event::byName('wedding');
		$weddingDate = Event::getDateTimeObjectAttribute(optional($wedding)->datetime);
		$isFuture = empty($weddingDate) ? Carbon::now()->diffInSeconds($weddingDate, false) > 0 : null;

		$rsvp = request()->session()->get('rsvp', null);
		if (! is_null($weddingDate) || ! is_null($rsvp)) {
			JavaScript::put([
				'weddingDate' => $weddingDate,
				'rsvp' => $rsvp,
			]);
		}
        return view('frontend.online-rsvp', compact('wedding', 'isFuture', 'weddingDate', 'rsvp'));
    }
}
