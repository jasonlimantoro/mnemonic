@extends('layouts.master', ['pageTitle' => 'Post'])

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-md-8 post-container">
        <h1 class="color-theme text-center post-title">{{ $post->title }}</h1>
        @if($post->image())
          <div class="post-image">
            <img src="{{ $post->image()->urlCache('post') }}" alt="post-image" class="img-responsive">
          </div>
        @endif
        <div class="blog-post">
          <p>{!! $post->description !!}</p>
        </div>
      </div>
      <div class="col-xs-12 col-md-4">
        <h4>All blogs</h4>
        @include('layouts.archives')
      </div>
    </div>
  </div>
@endsection