@extends('layouts.master')

@section('content')
	@if (!$slides->isEmpty())
		@component('layouts.carousel', ['carouselId' => 'mainCarousel'])
			@slot('carouselIndicators')
				@foreach($slides as $slide)
          <li data-target="#mainCarousel" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}"></li>
				@endforeach
			@endslot
	
			@slot('carouselSlides')
				@foreach($slides as $slide)
          <div class="item {{ $loop->first ? 'active' : '' }}">
						<img src="{{ $slide->url_cache }}" alt="slide" class="img-responsive">
						<div class="carousel-caption">
							{{ $slide->caption }}
						</div>
					</div>
				@endforeach
			@endslot
		@endcomponent
	@endif
	<div class="container">
		<div class="row">
      @foreach($posts as $post)
        <div class="col-xs-12 col-sm-6 post-container">
          @include('posts.frontend.post')
        </div>
      @endforeach
		</div>
    <div class="row row-center">
      <div class="col-md-4 col-center post-pagination">
        {{ $posts->links() }}
      </div>
    </div>
	</div>
@endsection
