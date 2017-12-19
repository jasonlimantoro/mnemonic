@extends('layouts.submaster')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @component('layouts.panel')
                @slot('heading')
                   <h1>Main Carousel</h1>
                   <p>Upload images for the carousel in your home page</p>
                @endslot

                @slot('body')
                    <h3>Your Carousel Images</h3>
                    <div class="row">
                        @foreach($images as $image)
                            <div class="col-md-4">
                                @component('layouts.thumbnail')
                                    @slot('thumbnailImage')
                                        <img src="{{ asset($image) }}" alt="carousel-image" class="img-responsive">
                                    @endslot

                                    @slot('thumbnailCaption')
                                        <p>A place to show caption</p>
                                    @endslot
                                @endcomponent
                            </div>
                        @endforeach
                    </div>
                    <form method="POST" action="/upload" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="inputImage">Upload More Images</label>
                            <input type="file" name="image" id="inputImage">
                        </div>
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </form>
                @endslot
            @endcomponent
        </div>
    </div>
@endsection