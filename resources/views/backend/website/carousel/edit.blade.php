@extends('backend.layouts.master')

@section('content')
	@component('backend.layouts.breadcrumb', ['current' => 'Main Carousel'])
	@endcomponent
  @component('backend.layouts.panel', [
    'title' => "Main Carousel"
  ])
    @slot('backButton')
      @component('backend.layouts.backButton', [
        'text' => 'All Carousel Images',
        'url' => route('carousel.images.index', ['carousel' => 1]),
      ])
        
      @endcomponent
    @endslot
    @slot('body')
      <img src="{{ $image->url_cache }}" alt="image" class="img-responsive">

			{{ Form::model($image, [
					'route' => ['carousel.images.update', 1, $image->id], 
					'method' => 'PATCH',
				])
			}}
				@include('backend.website.carousel.form', ['submitButtonText' => 'Update Carousel'])
			{{ Form::close() }}

    @endslot
  @endcomponent
@endsection