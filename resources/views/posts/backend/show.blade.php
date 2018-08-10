@extends('backend.layouts.master')

@section('content')
	@component('backend.layouts.breadcrumb', ['current' => 'Posts'])
	@endcomponent
  @component('backend.layouts.panel', [
    'title' => $post->page->title
  ])
    @slot('backButton')
       @component('backend.layouts.backButton', [
        'text' => 'Show All Posts in ' .  $page->title,
        'url' => route('posts.index', ['page' => $page->id])
      ])
      @endcomponent
    @endslot

    @slot('body')
      <h2>{{ $post->title }}</h2>
      <p>{{ $post->body }}</p>
      <hr>
      @include('backend.layouts.post-info')
    @endslot

  @endcomponent
@endsection