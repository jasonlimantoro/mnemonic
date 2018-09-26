@extends('backend.layouts.master')

@section('content')
	@component('backend.layouts.breadcrumb', ['current' => 'Create'])
    <li><a href="{{ subdomainRoute('carousel.images.index', ['carousel' => 1]) }}">Carousel</a></li>
	@endcomponent
  @component('backend.layouts.panel', [
    'title' => "Add an Image"
  ])
    @slot('body')
			{{ Form::open(['route' => ['carousel.images.store', env('APP_SUBDOMAIN'), 1]]) }}

				@include('backend.website.carousel.form', ['submitButtonText' => 'Publish'])

			{{ Form::close() }}
    @endslot
  @endcomponent
@endsection
