@extends('backend.layouts.master')

@section('content')
	@component('backend.layouts.breadcrumb', ['current' => 'Main Carousel'])
	@endcomponent
  @component('backend.layouts.panel', [
    'title' => "Add an Image"
  ])
		@slot('backButton')
      @component('backend.layouts.backButton', [
        'text' => 'All Carousel Images',
        'url' => route('carousel.images.index', ['carousel' => 1]),
      ])
      @endcomponent
    @endslot
    @slot('body')
			{{ Form::open(['route' => ['carousel.images.store', 1]]) }}

				@include('backend.website.carousel.form', ['submitButtonText' => 'Publish'])

			{{ Form::close() }}
    @endslot
  @endcomponent
@endsection
