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
                            @php
                                $albumID = $image->album_id;
                                $albumName = App\Album::find($albumID)['name'];
                            @endphp

                            <div class="col-md-4">
                                @component('layouts.thumbnail')
                                    @slot('thumbnailImage')
                                        <img src="{{ $image->url_cache }}" alt="image" class="img-responsive">
                                    @endslot

                                    @slot('thumbnailCaption')
                                        @if($albumName == '')
                                            @php
                                                $albumName = 'Uncategorized'
                                            @endphp
                                            
                                        @endif
                                        
                                        Album: {{ $albumName }}
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