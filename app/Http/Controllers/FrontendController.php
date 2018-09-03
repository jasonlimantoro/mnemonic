<?php

namespace App\Http\Controllers;

use App\Http\Resources\AlbumCollection;
use App\Models\Page;
use App\Models\Event;
use App\Models\Vendor;
use App\Models\Setting;
use Carbon\Carbon;
use App\Models\BridesBest;
use App\Models\PackageSetting;
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
        $posts = $posts->about()->get();

        return view('frontend.about', compact('posts'));
    }

    public function gallery(Albums $albums)
    {
        return view('frontend.gallery');
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
