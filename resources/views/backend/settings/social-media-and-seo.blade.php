@extends('layouts.submaster')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @component('layouts.panel')
                @slot('title')
                    Social Media page
                @endslot

                @slot('body')
                    Social Media body
                @endslot
            @endcomponent
        </div>
    </div>
@endsection