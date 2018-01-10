@extends('layouts.submaster')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @component('layouts.panel', ['backButton' => '', 'addButton' => ''])
                @slot('backButton')
                    @component('layouts.backButton')
                        @slot('url')
                            {{ route('gallery.index') }}
                        @endslot
                        @slot('text')
                            Back
                        @endslot
                    @endcomponent
                @endslot

                @slot('title')
                    Gallery
                @endslot

                @slot('body')
                    <div class="__react-root" id="AlbumForm">
                        
                    </div>
                    {{--  <form action="{{ route('galleries.image.store') }}" method="POST"
                    enctype="multipart/form-data">

                        <div class="form-group">
                            <label for="inputImage">Upload Images to Gallery</label>
                            <input type="file" name="image" id="inputImage">
                        </div>

                        <div class="form-group">
                            <label for="inputAlbum">Assign to Album</label>
                            <select name="album" id="inputAlbum" class="form-control">
                                <option selected disabled>Select Album</option>
                                @foreach ($albums as $album)
                                    <option value="{{ $album->id }}">{{ $album->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Upload</button>

                    </form>  --}}
                @endslot
            @endcomponent
        </div>
    </div>
@endsection