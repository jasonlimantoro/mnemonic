<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\PostsController;

class FrontendController extends Controller
{
    public function __construct() {
        $this->postInstance = new PostsController();
    }

    public function home() {
        return $this->postInstance->index(1);
    }

    public function about() {
        return $this->postInstance->index(2);
    }

    public function gallery() {
        // return $this->postInstance->index(3);
    }
}
