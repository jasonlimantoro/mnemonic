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
                    <form method="POST" action="{{ route('carousel.image.store', ['carousel' => 1]) }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="__react-root" id="CarouselForm"></div>
                        {{--  <div class="preview">No file uploaded</div>  --}}

                    </form>
                @endslot
            @endcomponent
        </div>
    </div>
@endsection
