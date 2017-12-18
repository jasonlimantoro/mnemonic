@extends('layouts.submaster')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @component('layouts.panel')
                @slot('heading')
                    Carousel page
                @endslot

                @slot('body')
                    Carousel body
                @endslot
            @endcomponent
        </div>
    </div>
@endsection