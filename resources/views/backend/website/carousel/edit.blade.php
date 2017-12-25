@extends('layouts.submaster')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @component('layouts.panel', ['backButton' => '', 'addButton' => ''])
                @slot('backButton')
                    <a href="{{ route('carousel.index') }}" class="btn btn-primary">
                        <i class="fa fa-angle-left"></i>
                        Back
                    </a>
                @endslot
                @slot('title')
                    Main Carousel
                @endslot

                @slot('body')
                    <h2> {{ $image->file_name }}</h2>
                    <img src="{{ $image->url_cache }}" alt="image" class="img-responsive">
                    Uploaded on {{ $image->created_at->toDayDateTimeString() }}
                    
                    <form 
                        method="POST"
                        enctype="multipart/form-data"
                        action="{{ route('carousel.image.update', ['carousel' => 1, 'image' => $image->id]) }}" 
                        >
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="inputImage">Change Image</label>
                            <input type="file" name="image" id="inputImage">
                        </div>
                        <div class="form-group">
                            <label for="carouselCaption">Caption</label>
                            <textarea name="caption" class="form-control" id="carouselCaption" cols="30" rows="10" placeholder="Enter caption">{{ $image->caption }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </form>
                    
                @endslot
            @endcomponent
        </div>
    </div>
@endsection