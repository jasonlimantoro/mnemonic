@extends('layouts.submaster')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @component('layouts.panel')
                @slot('heading')
                    Slide Show page
                @endslot

                @slot('body')
                    Slide Show body
                @endslot
            @endcomponent
        </div>
    </div>
@endsection