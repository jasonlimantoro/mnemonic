<?php

namespace App\Http\Controllers;

use App\Post;
use App\Page;
use App\Http\Requests\PostsRequest;
use App\Http\Controllers\GenericController as Controller;

class PostsController extends Controller
{
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
        $this->authorize('create', Post::class);

        return view('posts.backend.create', compact('page'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostsRequest $request, Page $page)
    {
        $page->addPost($request->only(['title', 'description']));

        $this->flash('Post is added succesfully');

        return redirect()->route('posts.index', ['page' => $page->id]);
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
        $this->authorize('update', Post::class);

        $page = $post->page;
        return view('posts.backend.edit', compact('post', 'page'));
    }

    public function update(PostsRequest $request, Page $page, Post $post)
    {
        $post->update($request->only(['title', 'description']));

        $this->flash('Post updated successfully!');

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
        $this->flash('Post is deleted successfully');
        return back();
    }

    public function read(Post $post)
    {
        return view('posts.frontend.read', compact('post'));
    }
}
