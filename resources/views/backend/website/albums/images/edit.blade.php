@extends('layouts.submaster')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @component('layouts.panel')
                @slot('backButton')
                    @component('layouts.backButton', [
                        'text' => 'Show '. $selectedAlbum->name . ' album',
                        'url' => route('albums.show', [ 'album' => $selectedAlbum->id ])
                    ])
                    @endcomponent
                @endslot
                @slot('title')
                   Edit Album Image
                @endslot

                @slot('body')
                    <h2> {{ $image->file_name }}</h2>
                    <p>From album: <strong>{{ $image->imageable->name }}</strong></p>
                    <img src="{{ $image->url_cache }}" alt="image" class="img-responsive">
                    Uploaded on {{ $image->created_at->toDayDateTimeString() }}

                    <form 
                        method="POST"
                        action="{{ route('album.images.update', ['album' => $album->id, 'image' => $image->id]) }}" 
						>
						{{ method_field('PATCH') }}
                        <div class="form-group">
                            <label for="formControlSelect">Assign to album: </label>
                            <select class="form-control" id="formControlSelect" name="album">
                                @foreach ($albums as $album)
                                    @if ($album == $selectedAlbum)
                                        <option value="{{ $album->id }}" selected>{{ $album->name }}</option>
                                    @else
                                        <option value="{{ $album->id }}">{{ $album->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                          </div>
                        
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </form>
                @endslot
            @endcomponent
        </div>
    </div>
@endsection