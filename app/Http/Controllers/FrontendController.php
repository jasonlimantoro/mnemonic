<?php

namespace App\Http\Controllers;

use JavaScript;
use App\Page;
use App\Event;
use App\Couple;
use App\Vendor;
use App\Setting;
use Carbon\Carbon;
use App\BridesBest;
use App\Repositories\Posts;

class FrontendController extends Controller
{
    public function home(Posts $posts)
    {
        $page = Page::home();

        $slides = $page->carousel->images;

        $posts = $posts->home()->paginate(6);

        return view('frontend.home', compact('posts', 'page', 'slides'));
    }

    public function about(Posts $posts)
    {
        $posts = $posts->about()->paginate(6);
        return view('frontend.about', compact('posts'));
    }

    public function gallery()
    {
        return view('frontend.gallery');
    }

    public function wedding()
    {
        $embed = Setting::getValueByKey('embed-video');
        $dates = Event::getDistinctDate();
        $events = Event::processDistinctDate($dates);
        $groom = Couple::groom();
        $bride = Couple::bride();
        $bbs = BridesBest::all();
		$vendors = Vendor::all();
		
		JavaScript::put([
			'bridesMaid' => BridesBest::bridesMaid(),
			'bestMen' => BridesBest::bestMen(),
		]);

        return view('frontend.wedding', compact('embed', 'events', 'groom', 'bride', 'bbs', 'vendors'));
    }

    public function onlineRSVP()
    {
        $wedding = Event::wedding();
        $weddingDate = Event::getDateTimeObjectAttribute(optional($wedding)->datetime);
        $isFuture = !empty($weddingDate) ? Carbon::now()->diffInSeconds($weddingDate, false) > 0 : null;

        $rsvp = request()->session()->get('rsvp', null);
        if (!is_null($weddingDate) || !is_null($rsvp)) {
            JavaScript::put([
                'weddingDate' => $weddingDate,
                'rsvp' => $rsvp,
            ]);
        }
        return view('frontend.online-rsvp', compact('wedding', 'isFuture', 'weddingDate', 'rsvp'));
    }
}
