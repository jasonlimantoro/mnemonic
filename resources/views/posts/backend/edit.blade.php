@extends('backend.layouts.master')

@section('content')
	@component('backend.layouts.breadcrumb', ['current' => $post->title ])
    <li><a href="{{ subdomainRoute('posts.index', ['page' => $page->id]) }}">{{ $page->title }}</a></li>
	@endcomponent
	@component('backend.layouts.panel', [
		'title' => $post->title
	])
		@slot('body')
			{{ Form::model($post, [
					'route' => ['posts.update', env('APP_SUBDOMAIN'), $page->id, $post->id],
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