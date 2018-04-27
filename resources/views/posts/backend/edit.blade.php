@extends('layouts.submaster')

@section('content')
  @component('layouts.panel', [
    'title' => $page->title
  ])
    @slot('backButton')
      @component('layouts.backButton', [
        'text' => 'Show All Posts in ' . $page->title,
        'url' => route('posts.index', ['page' => $page->id])
      ])
      @endcomponent
    @endslot

		@slot('body')
			{{ Form::model($post, ['route' => ['posts.update', $page->id, $post->id], 'method' => 'PATCH']) }}
				@include('posts.backend.form', ['submitButtonText' => 'Update Post'])
			{{ Form::close() }}
    @endslot
  @endcomponent
@endsection