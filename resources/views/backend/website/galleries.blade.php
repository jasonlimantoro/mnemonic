@extends('layouts.submaster')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @component('layouts.panel')
                @slot('heading')
                    Gallery pictures
                @endslot

                @slot('body')
                    <div class="row">
                        @foreach($galleryImages as $image)
                            <div class="col-md-4">
                                @component('layouts.thumbnail')
                                    @slot('thumbnailImage')
                                        <img src="{{ $image->url_cache }}" alt="image" class="img-responsive">
                                    @endslot

                                    @slot('thumbnailCaption')
                                        Album: {{ $image->album_id }} <br>
                                        Carousel: {{ $image->carousel_id }}
                                    @endslot
                                @endcomponent
                            </div>
                        @endforeach
                    </div>
                @endslot
            @endcomponent
        </div>
    </div>
@endsection