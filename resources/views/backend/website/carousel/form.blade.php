@extends('layouts.submaster')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @component('layouts.panel', ['backButton' => '', 'addButton' => ''])
                @slot('backButton')
                    @component('layouts.backButton', [
                        'text' => 'Back',
                        'url' => route('carousel.index', ['carousel' => 1]),
                    ])
                        
                    @endcomponent
                @endslot
                @slot('title')
                    Add an Image
                @endslot

                @slot('body')
                    <form method="POST" action="{{ route('carousel.image.upload', ['carousel' => 1]) }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="inputImage">Upload More Images</label>
                            <input type="file" name="image" id="inputImage">
                        </div>
                        <div class="form-group">
                            <label for="carouselCaption">Caption</label>
                            <textarea name="caption" class="form-control" id="carouselCaption" cols="30" rows="10" placeholder="Enter caption"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </form>
                @endslot
            @endcomponent
        </div>
    </div>
@endsection
