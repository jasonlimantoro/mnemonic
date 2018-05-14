<?php

namespace App\Http\Controllers;

use App\Post;
use App\Page;
use Illuminate\Http\Request;
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
            'description' => 'required'
        ];
        $customMessages = [
            'title.unique' => 'The :attribute field must be unique! Either delete the post with the same title or use another title!'
        ];
        $this->validate($request, $rules, $customMessages);

        // add a new post to a page
        $page->addPost(request('title'), request('description'), auth()->id());

        $this->flash('Post is added succesfully');

        return redirect()->route('posts.index');
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

    public function update(Request $request, Page $page, Post $post)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required'
        ]);
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
