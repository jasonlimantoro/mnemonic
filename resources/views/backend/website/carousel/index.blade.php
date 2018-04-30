@extends('layouts.submaster')

@section('content')
  <div class="row">
    <div class="col-md-12">
      @component('layouts.panel', [
        'title' => "Main Carousel"
      ])
        @slot('addButton')
          @component('layouts.addButton', [
            'item' => 'Images', 
            'url' => route('carousel.images.create', ['carousel' => 1])
          ])
          @endcomponent
        @endslot

        @slot('body')
          <h3>Your Carousel Images</h3>
					@component('layouts.table')
						@slot('tableHeader')
							<tr>
								<th class="col title">Images</th>
								<th class="col body">Caption</th>
								<th class="col action">Action</th>
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