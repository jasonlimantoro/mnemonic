<?php

namespace App\Http\Controllers;

use App\Page;
use App\Event;
use App\VIP;
use App\Repositories\Albums;
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

    public function gallery(Albums $albums)
    {
        $albums = $albums->categorized()->get();
        return view('frontend.gallery', compact('albums'));
    }

    public function wedding()
    {
        $embed = Setting::getValueByKey('embed-video');

        $dates = Event::process()
            ->displayEventsGroupByDate();

        $groom = VIP::groom();

        $bride = VIP::bride();

        $bridesMaid = BridesBest::bridesMaid();

        $bestMen = BridesBest::bestMen();

		$vendors = Vendor::all();

        return view('frontend.wedding', compact('embed', 'dates', 'groom', 'bride', 'bbs', 'vendors', 'bridesMaid', 'bestMen'));
    }

    public function onlineRSVP()
    {
        $wedding = Event::wedding();

        $weddingDate = optional($wedding)->datetime;

        $isFuture = !empty($weddingDate) ? Carbon::now()->diffInSeconds($weddingDate, false) > 0 : null;

        return view('frontend.online-rsvp', compact('wedding', 'isFuture', 'weddingDate'));
    }
}
