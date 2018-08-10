@extends('backend.layouts.master')

@section('content')
	@component('backend.layouts.breadcrumb', ['current' => 'Main Carousel'])
	@endcomponent
  @component('backend.layouts.panel', [
    'title' => "Carousel"
	])
		@can('create-carousel-image')
			@slot('addButton')
				@component('backend.layouts.addButton', [
					'url' => route('carousel.images.create', ['carousel' => 1])
				])
				@endcomponent
			@endslot
		@endcan
    @slot('body')
      <p>Your carousel images in the <a href="{{ route('front.index') }}" target="_blank">Home Page</a></p>
			@component('layouts.table')
				@slot('tableHeader')
					<tr>
						<th class="col-xs-3 title">Images</th>
						<th class="col-xs-6 body">Caption</th>
						<th class="col-xs-1 action">Action</th>
					</tr>
				@endslot

				@slot('tableBody')
					@foreach($images as $image)
						@include('backend.website.carousel.image')		
					@endforeach
				@endslot
			@endcomponent
    @endslot
  @endcomponent
@endsection