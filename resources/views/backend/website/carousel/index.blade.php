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
                    @include('backend.website.carousel.show')
                    
                    @include('backend.website.carousel.form')
                @endslot
            @endcomponent
        </div>
    </div>
@endsection