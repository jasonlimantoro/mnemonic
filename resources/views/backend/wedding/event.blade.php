@extends('layouts.submaster')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @component('layouts.panel')
                @slot('heading')
                    Event
                @endslot

                @slot('body')
                    Event body
                @endslot
            @endcomponent
        </div>
    </div>
@endsection