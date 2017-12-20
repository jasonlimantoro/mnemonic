@extends('layouts.master')


@section('content')
    @component('layouts.carousel')
        @slot('carouselId')
            mainCarousel
        @endslot

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
                        <img src="{{ url('/imagecache/fit/' . $slide) }}" alt="slide" class="img-responsive">
                        <div class="carousel-caption">
                            ...
                        </div>
                    </div>

                @else
                    <div class="item">
                        <img src="{{ url('/imagecache/fit/' . $slide) }}" alt="slide" class="img-responsive">
                        <div class="carousel-caption">
                            ...
                        </div>
                    </div>
                @endif
                
            @endforeach
            
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-md-12">
            <h2>List of Posts in Home</h2>
            <div class="row">
                @foreach($posts as $post)
                    @include('posts.frontend.post')
                @endforeach
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    {{--  <script>
        $(document).ready(function(){
            $('.item').first().addClass('active');
        });
    </script>  --}}
@endsection