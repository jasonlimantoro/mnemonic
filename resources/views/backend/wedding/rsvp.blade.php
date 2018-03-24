@extends('layouts.submaster')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @component('layouts.panel')
                @slot('title')
                    RSVP
                @endslot

                @slot('body')
                    RSVP body
                @endslot
            @endcomponent
        </div>
    </div>
@endsection