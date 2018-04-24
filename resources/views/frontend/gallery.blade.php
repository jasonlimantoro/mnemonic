@extends('layouts.master')

@section('content')
  <div class="row">
		<div class="col-md-12">
			@if (!request('album'))
				@component('layouts.carousel')
					@slot('carouselSlides')
						@foreach($albums as $album)
							@if ($loop->first)
								<div class="item active">
							@else
								<div class="item">
							@endif
							<img src="{{ $album->featuredImage()['url_cache'] }}" alt="album" class="img-responsive">
							<div class="carousel-caption">
								<h4> <a href="/gallery?album={{ $album->id }}"> {{ $album->name }} </a> </h4>
							</div>
						</div>
						@endforeach
					@endslot
				@endcomponent
			@endif
			
			{{--  Show album based on url query  --}}
			@if (request('album'))
				@foreach ($albums as $album)
					@component('layouts.thumbnail')
						@slot('thumbnailImage')
							<img src="{{ $album->featuredImage()['url_cache'] }}" alt="No featured image" class="img-responsive">
						@endslot

						@slot('thumbnailCaption')
							<h1>{{ $album->name }}</h1>
						@endslot
						@endforeach
					@endcomponent
					@foreach ($album->images as $image)
						<img src="{{ $image->url_cache }}" alt="" class="img-responsive">
						<hr>
					@endforeach
			@endif
		</div>
  </div>
@endsection