@extends('backend.layouts.master')

@section('content')
	@component('backend.layouts.breadcrumb', ['current' => 'Create'])
    <li><a href="{{ route('posts.index', ['page' => $page->id]) }}">{{ $page->title }}</a></li>
	@endcomponent
  @component('backend.layouts.panel', [
    'title' => $page->title
  ])
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

