<?php

namespace App\Http\Controllers;

use App\Http\Controllers\GenericController as Controller;
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
        $this->middleware('auth')->except(['read']);
    }

    public function index(Page $page)
    {
        $posts = $page->posts()->latest()->get();
        return view('posts.backend.index', compact('page', 'posts'));
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
        
        $this->flash('success_msg', 'Post is added succesfully');

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page, Post $post)
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
    public function edit(Page $page, Post $post)
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
    public function update(Request $request, Page $page, Post $post)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required'
		]);
		$updatedPost = $request->all();
        $post->update($updatedPost);

        //store status message
        $this->flash('success_msg', 'Post updated successfully!');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
	public function destroy(Page $page, Post $post)
    {
        $post->delete();
        $this->flash('success_msg', 'Post is deleted successfully');
        return back();
    }

    public function read($page_title, $post_title) {
        $formatted_post_title = title_case(str_replace('-', ' ', $post_title));
        $post = Post::where('title', $formatted_post_title)->first();
        $page = $post->page;
        return view('posts.frontend.read', compact('post', 'page'));
    }

}
