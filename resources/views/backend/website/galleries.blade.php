@extends('layouts.submaster')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @component('layouts.panel')
                @slot('heading')
                    <h1>Galleries</h1>
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
                                        <img src="{{ $image->url_asset }}" alt="image" class="img-responsive">
                                    @endslot

                                    @slot('thumbnailCaption')
                                        {{--  @if($albumName == '')
                                            @php
                                                $albumName = 'Uncategorized'
                                            @endphp
                                            
                                        @endif  --}}
                                        Album: 
                                        <a href="{{ route('albums.show', ['album' => $albumID ]) }}">
                                            {{ $albumName }}
                                        </a>
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