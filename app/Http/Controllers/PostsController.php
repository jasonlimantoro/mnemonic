<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Page;
use App\Http\Controllers\CarouselImagesController;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'read']);
    }

    public function index($page_id)
    {
        $posts = Post::where('page_id', '=', $page_id)->latest()->get();
        $page = $posts->first()->page;
        if ($page_id == 1) {
            // Home
            
            // All uploaded images
            $carouselInstance = new CarouselImagesController();
            $slides = $carouselInstance->images;

            return view('posts.frontend.index', compact('posts', 'page', 'slides'));
        }
        else {
            // about
            return view('posts.frontend.about', compact('posts', 'page'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Page $page)
    {
        return view('posts.backend.create', compact('page'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Page $page)
    {
        // validate the form
        $rules = [
            'title' => 'required|unique:posts,title',
            'body' => 'required'
        ];
        $customMessages = [
            'title.unique' => 'The :attribute field must be unique! Either delete the post with the same title or use another title!'
        ];
        $this->validate($request, $rules, $customMessages);
        
        // add a new post to a page
        $page->addPost(request('title'), request('body'), auth()->id());
        
        \Session::flash('success_msg', 'Post is added succesfully');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {   
        $page = $post->page;
        return view('posts.backend.show', compact('post', 'page'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        // page in which the post belongsTo
        $page = $post->page;
        return view('posts.backend.edit', compact('post', 'page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required'
        ]);
        $updatedPost = $request->all();
        Post::find($id)->update($updatedPost);

        //store status message
        \Session::flash('success_msg', 'Post updated successfully!');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        \Session::flash('success_msg', 'Post is deleted successfully');
        return redirect()->back();
    }

    public function read($page_title, $post_title) {
        $formatted_post_title = title_case(str_replace('-', ' ', $post_title));
        $post = Post::where('title', $formatted_post_title)->first();
        $page = $post->page;
        return view('posts.frontend.read', compact('post', 'page'));
    }

}
