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
                    <form method="POST" action="/upload" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="inputImage">Upload Image</label>
                            <input type="file" name="image" id="inputImage">
                        </div>
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </form>
                @endslot
            @endcomponent
        </div>
    </div>
@endsection