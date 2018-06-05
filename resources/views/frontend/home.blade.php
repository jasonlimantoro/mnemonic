@extends('layouts.master')

@section('content')
	@if (!$slides->isEmpty())
		@component('layouts.carousel', ['carouselId' => 'mainCarousel'])
			@slot('carouselIndicators')
				@foreach($slides as $slide)
					@if ($loop->first)
						<li data-target="#mainCarousel" data-slide-to="{{ $loop->index }}" class="active"></li>
					@else
						<li data-target="#mainCarousel" data-slide-to="{{ $loop->index }}"></li>
					@endif
				@endforeach
			@endslot
	
			@slot('carouselSlides')
				@foreach($slides as $slide)
					@if ($loop->first)
						<div class="item active">
					@else
						<div class="item">
					@endif
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
	</div>
@endsection
