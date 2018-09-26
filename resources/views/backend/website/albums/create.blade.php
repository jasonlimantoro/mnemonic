@extends('backend.layouts.master')

@section('content')
	@component('backend.layouts.breadcrumb', ['current' => 'Create'])
    <li><a href="{{ route('images.index') }}">Galleries</a></li>
    <li><a href="{{ route('albums.index') }}">Albums</a></li>
	@endcomponent
  @component('backend.layouts.panel', [
    'title' => 'Create a new album'
  ])
		@slot('body')
			{{ Form::open(['route' => 'albums.store', 'enctype' => 'multipart/form-data']) }}
				@include('backend.website.albums.form', ['submitButtonText' => 'Publish'])	
			{{ Form::close() }}
    @endslot
  @endcomponent
@endsection