@extends('backend.layouts.master')

@section('content')
	@component('backend.layouts.breadcrumb', ['current' => 'Posts'])
	@endcomponent
	@component('backend.layouts.panel', [
		'title' => $post->title
	])
		@slot('backButton')
			@component('backend.layouts.backButton', [
				'text' => 'All Posts in ' . $page->title,
				'url' => route('posts.index', ['page' => $page->id])
			])
			@endcomponent
		@endslot

		@slot('body')
			{{ Form::model($post, [
					'route' => ['posts.update', $page->id, $post->id], 
					'method' => 'PATCH', 
				])
			}}
				@include('posts.backend.form', [
					'submitButtonText' => 'Update Post',
					'displayCurrentImage' => true,
					])
			{{ Form::close() }}
		@endslot
	@endcomponent
@endsection