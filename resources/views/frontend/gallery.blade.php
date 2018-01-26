@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @if (!request('album'))
                @component('layouts.carousel', ['carouselIndicators' => ''])
                    @slot('carouselId')
                        galleryCarousel
                    @endslot
            
                    @slot('carouselSlides')
                        @foreach($albums as $album)
                            @if ($loop->first)
                                {{-- This is the first iteration --}}
                                <div class="item active">
                            @else
                                {{--  The remaining iteration  --}}
                                <div class="item">
                            @endif
                                <img src="{{ $album->featuredImage()->first()['url_cache'] }}" alt="album" class="img-responsive">
                                <div class="carousel-caption">
                                    <h4>
                                        <a href="/gallery?album={{ $album->id }}">
                                            {{ $album->name }}
                                        </a>
                                    </h4>
                                </div>
                            </div>
                        @endforeach
                    @endslot
            
                    @slot('carouselControls')
                        @if(!empty($albums->count()))
                            <a class="left carousel-control" href="#galleryCarousel" role="button" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="right carousel-control" href="#galleryCarousel" role="button" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        @endif
                        
                    @endslot
                @endcomponent
            @endif
            
            @if (request('album'))
                @foreach ($albums as $album)
                    @component('layouts.thumbnail')
                        @slot('thumbnailImage')
                            <img src="{{ $album->featuredImage()->first()['url_cache'] }}" alt="No featured image" class="img-responsive">
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