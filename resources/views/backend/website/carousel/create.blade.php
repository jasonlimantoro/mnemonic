@extends('backend.layouts.master')

@section('content')
  <div class="row">
    <div class="col-md-12">
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
					{{ Form::open(['route' => ['carousel.images.store', 1], 'enctype' => 'multipart/form-data']) }}

						@include('backend.website.carousel.form', ['submitButtonText' => 'Publish'])

					{{ Form::close() }}
        @endslot
      @endcomponent
    </div>
  </div>
@endsection
