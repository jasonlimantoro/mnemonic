<?php

namespace App\Http\Controllers;

use App\Filters\PostFilter;
use App\Post;
use App\Page;
use App\Image;
use App\Http\Requests\PostsRequest;
use App\Http\Controllers\GenericController as Controller;

class PostsController extends Controller
{
    public $filter = 'post';
    public $filterClass = PostFilter::class;

	public function __construct() 
	{
		$this->middleware('can:read,App\Post')->except('read');
		$this->middleware('can:create,App\Post')->only(['create', 'store']);
		$this->middleware('can:update,App\Post')->only(['edit', 'update']);
		$this->middleware('can:delete,App\Post')->only('destroy');
	}
    /**
     * Display a listing of the resource.
     *
     * @param Page $page
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Page $page)
    {
        $posts = Post::filtersSearch(request(['search', 'order', 'method']), 'title')
                        ->where('page_id', $page->id)
                        ->latest()
                        ->get();
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
     * @param PostsRequest $request
     * @param Page $page
     * @return \Illuminate\Http\Response
     */
    public function store(PostsRequest $request, Page $page)
    {
		$post = $page->addPost($request->only(['title', 'description']));
		
		optional(Image::handleUpload($request), $this->filterClass, $this->filter)->addTo($post);

        $this->flash('Post is added succesfully');

        return redirect()->route('posts.index', ['page' => $page->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param Page $page
     * @param Post $post
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
     * @param Page $page
     * @param Post $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page, Post $post)
    {
		$postImage = optional($post->image)->url_cache;

		$page = $post->page;

        return view('posts.backend.edit', compact('post', 'page', 'postImage'));
    }

    public function update(PostsRequest $request, Page $page, Post $post)
    {
		$post->update($request->only(['title', 'description']));
		
		optional(Image::handleUpload($request, $this->filterClass, $this->filter))->addTo($post);

        $this->flash('Post updated successfully!');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Page $page
     * @param Post $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page, Post $post)
    {
        $post->delete();
        $this->flash('Post is deleted successfully');
        return back();
    }

    public function read(Post $post)
    {
        return view('posts.frontend.read', compact('post'));
    }
}
