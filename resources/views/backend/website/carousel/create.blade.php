@extends('backend.layouts.master')

@section('content')
	@component('backend.layouts.breadcrumb', ['current' => 'Create'])
    <li><a href="{{ route('carousel.images.index', ['carousel' => 1]) }}">Carousel</a></li>
	@endcomponent
  @component('backend.layouts.panel', [
    'title' => "Add an Image"
  ])
    @slot('body')
			{{ Form::open(['route' => ['carousel.images.store', 1]]) }}

				@include('backend.website.carousel.form', ['submitButtonText' => 'Publish'])

			{{ Form::close() }}
    @endslot
  @endcomponent
@endsection
