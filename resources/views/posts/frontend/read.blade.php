@extends('layouts.master')

@section('content')
	<div class="container">
    <div class="post-container">
      <h1 class="color-theme text-center post-title">{{ $post->title }}</h1>
      @isset($post->image)
        <div class="post-image">
          <img src="{{ $post->image->url_cache }}" alt="post-image" class="img-responsive">
        </div>
      @endisset
      <div class="row">
        <div class="col-md-8 blog-post">
          <p>{!! $post->description !!}</p>
        </div>
        <div class="col-md-4">
          <h1>Archives</h1>
          @include('layouts.archives')
        </div>
      </div>
    </div>
  </div>
@endsection