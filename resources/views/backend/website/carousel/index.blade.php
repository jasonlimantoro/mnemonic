@extends('backend.layouts.master')

@section('content')
  <div class="row">
    <div class="col-md-12">
			@component('backend.layouts.breadcrumb', ['current' => 'Main Carousel'])
			@endcomponent
      @component('backend.layouts.panel', [
        'title' => "Main Carousel"
			])
				@can('create-carousel-image')
					@slot('addButton')
						@component('backend.layouts.addButton', [
							'item' => 'Images', 
							'url' => route('carousel.images.create', ['carousel' => 1])
						])
						@endcomponent
					@endslot
				@endcan
        @slot('body')
          <h3>Your Carousel Images</h3>
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
    </div>
  </div>
@endsection