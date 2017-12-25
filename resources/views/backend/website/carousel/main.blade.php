@extends('layouts.submaster')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @component('layouts.panel', ['backButton' => '', 'addButton' => ''])
                @slot('title')
                   Main Carousel
                @endslot
                @slot('addButton')
                    @component('layouts.addButton',
                    [
                        'item' => 'Images', 
                        'url' => '#'
                    ])
                    @endcomponent
                @endslot

                @slot('body')
                    <h3>Your Carousel Images</h3>
                    @include('backend.website.carousel.index')
                    
                    @include('backend.website.carousel.form')
                @endslot
            @endcomponent
        </div>
    </div>
@endsection