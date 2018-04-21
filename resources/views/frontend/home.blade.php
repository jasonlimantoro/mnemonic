@extends('layouts.master')

@section('content')
    @component('layouts.carousel', ['carouselId' => 'mainCarousel'])
        @slot('carouselIndicators')
            @foreach($slides as $slide)
                @if ($loop->first)
                    {{-- This is the first iteration --}}
                    <li data-target="#mainCarousel" data-slide-to="{{ $loop->index }}" class="active"></li>
                @else
                    <li data-target="#mainCarousel" data-slide-to="{{ $loop->index }}"></li>
                @endif
            @endforeach
        @endslot

        @slot('carouselSlides')
            @foreach($slides as $slide)
                @if ($loop->first)
                    {{-- This is the first iteration --}}
                    <div class="item active">
                @else
                    {{--  The remaining iteration  --}}
                    <div class="item">
                @endif
                    <img src="{{ $slide->url_cache }}" alt="slide" class="img-responsive">
                    <div class="carousel-caption">
                        {{ $slide->caption }}
                    </div>
                </div>
            @endforeach
        @endslot

        @slot('carouselControls')
            @if(!empty($slides->count()))
                <a class="left carousel-control" href="#mainCarousel" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#mainCarousel" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            @endif
        @endslot
    @endcomponent

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
@endsection
