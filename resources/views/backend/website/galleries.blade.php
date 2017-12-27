@extends('layouts.submaster')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @component('layouts.panel', ['backButton' => '', 'addButton' => ''])
                @slot('title')
                    Galleries
                @endslot

                @slot('addButton')
                    @component('layouts.addButton', [
                        'item' => 'Images',
                        'url' => "#"
                    ])
                        
                    @endcomponent
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
                                        Name: {{ $image->file_name }} <br>
                                        Album: 
                                        @if ($image->album !== NULL)
                                            <a href="{{ route('albums.show', ['album' => $image->album_id ]) }}">
                                                {{ $image->album->name }}
                                            </a>
                                        @else
                                            <i>Uncategorized</i>
                                        @endif

                                        <div>
                                            <a 
                                                href="{{ route('galleries.image.delete',['image' => $image->id ]) }}" 
                                                id="DeleteIcon" 
                                                class="__react-root" 
                                                role="button"
                                                data-toggle="tooltip"
                                                title="Delete this image"
                                                data-placement="top"
                                                >
                                            </a>
                                        </div>
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