@extends('backend.layouts.master')

@section('content')
	@component('backend.layouts.breadcrumb', ['current' => 'Posts'])
	@endcomponent
	@component('backend.layouts.panel', ['title' => $page->title ])
		@unless ($page->title === 'About')
			@can('create', App\Post::class)
				@slot('addButton')
					@component('backend.layouts.addButton', [
						'url' => route('posts.create', ['page' => $page->id ])
					])
					@endcomponent
				@endslot
			@endcan
		@endunless

		@slot('body')
			@component('backend.layouts.query', [
				'title' => 'Title',
				'body' => 'Description'
			]) 
			@endcomponent
			@component('layouts.table')
				@slot('tableHeader')
					<tr>
						<th class="col-xs-3 title">Title</th>
						<th class="col-xs-6 body">Body</th>
						<th class="col-xs-1 action">Action</th>
					</tr>
				@endslot
		
				@slot('tableBody')
					@foreach($posts as $post)
						@include('posts.backend.post')
					@endforeach
				@endslot
			@endcomponent
		@endslot
	@endcomponent
@endsection

