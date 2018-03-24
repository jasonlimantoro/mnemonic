@extends('layouts.submaster')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @component('layouts.panel')
                @slot('title')
                    General Settings
                @endslot

                @slot('body')
                    General Settings Body
                @endslot
            @endcomponent
        </div>
    </div>
@endsection