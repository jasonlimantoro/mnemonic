@extends('backend.layouts.master')

@section('content')
	<div class="row">
		<div class="col-md-12">
			@component('backend.layouts.breadcrumb', ['current' => 'Posts'])
			@endcomponent
			@component('backend.layouts.panel', ['title' => $page->title ])
				@unless ($page->title === 'About Us')
					@can('create', App\Post::class)
						@slot('addButton')
							@component('backend.layouts.addButton', [
								'item' => "Post", 
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
								<th class="col title">Title</th>
								<th class="col body">Body</th>
								<th class="col action">Action</th>
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
		</div>
	</div>
@endsection

