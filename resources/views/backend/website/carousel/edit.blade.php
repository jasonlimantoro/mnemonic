@extends('backend.layouts.master')

@section('content')
	@component('backend.layouts.breadcrumb', ['current' => $image->name])
   <li><a href="{{ subdomainRoute('carousel.images.index', ['carousel' => 1]) }}">Carousel</a></li>
	@endcomponent
  @component('backend.layouts.panel', [
    'title' => "Main Carousel"
  ])
    @slot('body')
      <img src="{{ $image->urlCache('gallery') }}" alt="image" class="img-responsive">

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