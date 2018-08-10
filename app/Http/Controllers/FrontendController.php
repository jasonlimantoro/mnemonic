<?php

namespace App\Http\Controllers;

use App\Page;
use App\Event;
use App\Vendor;
use App\Setting;
use Carbon\Carbon;
use App\BridesBest;
use App\PackageSetting;
use App\Repositories\Posts;
use App\Repositories\Albums;

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
        $albums = $albums->categorized()->with('images')->get();
        return view('frontend.gallery', compact('albums'));
    }

    public function day(PackageSetting $setting)
    {
        $mode = $setting->getMode();

        $embed = Setting::getValueByKey('embed-video');

        $dates = Event::process()
            ->displayEventsGroupByDate();

        $vip = $setting->getVip();

        if($mode === 'birthday') {
            return view('frontend.birthday', compact('embed', 'dates', 'vip'));
        }

        $bridesMaid = BridesBest::bridesMaid();

        $bestMen = BridesBest::bestMen();

        $vendors = Vendor::all();

        return view('frontend.wedding', compact('embed', 'dates', 'vip', 'bbs', 'vendors', 'bridesMaid', 'bestMen'));
    }

    public function rsvp(PackageSetting $setting)
    {
        $mode = $setting->getMode();

        $event = Event::{$mode}();

        $eventDate = optional($event)->datetime;

        $isFuture = !empty($eventDate) ? Carbon::now()->diffInSeconds($eventDate, false) > 0 : null;

        if ($mode === 'birthday'){
            return view('frontend.rsvpBirthday', compact('event', 'eventDate', 'isFuture'));
        }

        return view('frontend.rsvpWedding', compact('event', 'eventDate', 'isFuture'));
    }
}
