@extends('layouts.submaster')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @component('layouts.panel', ['addButton' => ''])
                @slot('backButton')
                    @component('layouts.backButton', [
                        'text' => 'Show all albums',
                        'url' => route('albums.index')
                    ])
                        
                    @endcomponent
                @endslot
                @slot('title')
                    Album: {{ $album->name}}
                @endslot


                @slot('body')
                    <p>
                        Description: <strong>{{ $album->description }}</strong> 
                    </p>

                    <form action="{{ route('album.images.store', ['album' => $album->id]) }}" method="POST" enctype="multipart/form-data">
                        <div class="__react-root" id="AlbumForm">
                        </div>
                    </form>
                @endslot
            @endcomponent
        </div>
    </div>
@endsection