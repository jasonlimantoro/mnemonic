@extends('layouts.master')

@section('content')
	<div class="web-container">
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
		<div class="row">
			<div class="col-md-8">
				@foreach($posts as $post)
					@include('posts.frontend.post')
				@endforeach
			</div>
			<div class="col-md-4">
				<h1>Archives</h1>
				@include('layouts.archives')
			</div>
		</div>
	</div>
@endsection
