@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-offset-2 col-md-8">
            @foreach ($albums as $album)

                @component('layouts.thumbnail')
                    @slot('thumbnailImage')
                        <img src="{{ $album->featuredImage()->first()['url_cache'] }}" alt="No featured image" class="img-responsive">
                    @endslot

                    @slot('thumbnailCaption')
                        <h1>
                            <a href="/gallery?album={{ $album->id }}">
                                {{ $album->name }}
                            </a>
                        </h1>
                    @endslot
                @endcomponent
                
                @if (request('album'))
                    @foreach ($album->images as $image)
                        <img src="{{ $image->url_cache }}" alt="" class="img-responsive">
                    @endforeach
                @endif

                <hr>
            @endforeach
        </div>
    </div>
@endsection