@extends('backend.layouts.master')

@section('content')
	@component('backend.layouts.breadcrumb', ['current' =>  $post->title ])
    <li><a href="{{ subdomainRoute('posts.index', ['page' => $page->id]) }}">{{ $page->title }}</a></li>
	@endcomponent
  @component('backend.layouts.panel', [
    'title' => $post->page->title
  ])
    @slot('body')
      <h2>{{ $post->title }}</h2>
      {!! $post->description !!}
      <hr>
      @include('backend.layouts.post-info')
    @endslot

  @endcomponent
@endsection