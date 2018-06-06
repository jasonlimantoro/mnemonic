@extends('backend.layouts.master')

@section('content')
  <div class="row">
    <div class="col-md-12">
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
          <h2> {{ $image->file_name }}</h2>
          <img src="{{ $image->url_cache }}" alt="image" class="img-responsive">
          Uploaded on {{ $image->created_at->toDayDateTimeString() }}

					{{ Form::model($image, [
							'route' => ['carousel.images.update', 1, $image->id], 
							'method' => 'PATCH',
							'enctype' => 'multipart/form-data'
						]) 
					}}
						@include('backend.website.carousel.form', ['submitButtonText' => 'Update Carousel'])
					{{ Form::close() }}

        @endslot
      @endcomponent
    </div>
  </div>
@endsection