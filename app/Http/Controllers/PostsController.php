<?php

namespace App\Http\Controllers;

use App\Post;
use App\Page;
use App\Repositories\Posts;
use App\Http\Requests\PostsRequest;
use App\Http\Middleware\CheckPage;
use App\Http\Controllers\GenericController as Controller;
use test\Mockery\Adapter\Phpunit\BaseClassStub;

class PostsController extends Controller
{

	public function __construct() 
	{
		$this->middleware('can:read,App\Post')->except('read');
		$this->middleware('can:create,App\Post')->only(['create', 'store']);
		$this->middleware('can:update,App\Post')->only(['edit', 'update']);
		$this->middleware('can:delete,App\Post')->only('destroy');

		$this->middleware(CheckPage::class)->only(['create', 'store', 'delete']);
		$this->middleware('package.posts')->only(['create', 'store']);
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
     * @param Page $page
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
        $file = $request->gallery_image;

        $post = $page->addPost($request->only(['title', 'description']));

        $post->addImage($file);

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

        $template = $page->title === 'About' ? 'vip' : 'post';

        return view('posts.backend.edit', compact('post', 'page', 'postImage', 'template'));
    }

    public function update(PostsRequest $request, Page $page, Post $post)
    {

        $file = $request->gallery_image;

        $template = $page->title === 'About' ? 'vip' : 'post';

        tap($post)
            ->update($request->only(['title', 'description']))
            ->addImage($file, $template);

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

        $post->image()->delete();

        $this->flash('Post is deleted successfully');

        return back();
    }

    public function read(Post $post, Posts $posts)
    {
        $homePosts = $posts->home()->paginate(6);
        return view('posts.frontend.read', compact('post', 'homePosts'));
    }
}
