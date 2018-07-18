@extends('backend.layouts.master')

@section('content')
	@component('backend.layouts.breadcrumb', ['current' => 'Posts'])
	@endcomponent
  @component('backend.layouts.panel', [
    'title' => $page->title
  ])
    @slot('backButton')
      @component('backend.layouts.backButton', [
        'text' => 'All Posts in ' .  $page->title,
        'url' => route('posts.index', ['page' => $page->id])
      ])
        
      @endcomponent
    @endslot

		@slot('body')
			{{ Form::open(['route' => ['posts.store', $page->id]]) }}
				@include('posts.backend.form', [
					'submitButtonText' => 'Publish',
					'displayCurrentImage' => false,
				])
			{{ Form::close() }}
    @endslot
  @endcomponent
@endsection

