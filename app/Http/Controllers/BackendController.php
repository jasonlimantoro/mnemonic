<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

    public function home() {
        return view('backend.pages.home');
    }

    public function about() {
        return view('backend.pages.about-us');
    }

    public function gallery() {
        return view('backend.pages.galleries');
    }

    public function slideshow() {
        return view('backend.themes.photo-slideshow');
    }

    public function couple() {
        return view('backend.wedding.groom-and-bride');
    }

    public function event() {
        return view('backend.wedding.event');
    }

    public function brides() {
        return view('backend.wedding.bridesmaid-and-bestman');
    }

    public function vendors() {
        return view('backend.wedding.vendors');
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
