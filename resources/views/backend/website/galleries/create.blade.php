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
                    <form action="{{ route('galleries.image.store') }}" method="POST"
                    enctype="multipart/form-data">

                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="inputImage">Upload Images to Gallery</label>
                            <input type="file" name="image" id="inputImage">
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Upload</button>

                    </form>
                @endslot
            @endcomponent
        </div>
    </div>
@endsection