@extends('layouts.submaster')

@section('content')
  <div class="row">
    <div class="col-md-12">
			@component('layouts.breadcrumb', ['current' => 'Posts'])
			@endcomponent
      @component('layouts.panel', [
        'title' => $page->title
      ])
        @slot('backButton')
          @component('layouts.backButton', [
            'text' => 'Show All Posts in ' .  $page->title,
            'url' => route('posts.index', ['page' => $page->id])
          ])
            
          @endcomponent
        @endslot

				@slot('body')
					{{ Form::open(['route' => ['posts.store', $page->id]]) }}
						@include('posts.backend.form', ['submitButtonText' => 'Publish'])
					{{ Form::close() }}
        @endslot
      @endcomponent
    </div>
  </div>

@endsection

