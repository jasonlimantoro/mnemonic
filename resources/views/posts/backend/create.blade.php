@extends('backend.layouts.master')

@section('content')
  <div class="row">
    <div class="col-md-12">
			@component('backend.layouts.breadcrumb', ['current' => 'Posts'])
			@endcomponent
      @component('backend.layouts.panel', [
        'title' => $page->title
      ])
        @slot('backButton')
          @component('backend.layouts.backButton', [
            'text' => 'Show All Posts in ' .  $page->title,
            'url' => route('posts.index', ['page' => $page->id])
          ])
            
          @endcomponent
        @endslot

				@slot('body')
					{{ Form::open(['route' => ['posts.store', $page->id], 'enctype' => 'multipart/form-data']) }}
						@include('posts.backend.form', [
							'submitButtonText' => 'Publish',
							'displayCurrentImage' => false,
						])
					{{ Form::close() }}
        @endslot
      @endcomponent
    </div>
  </div>

@endsection

