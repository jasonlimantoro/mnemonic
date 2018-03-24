@extends('layouts.submaster')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @component('layouts.panel')
                @slot('title')
                    Site Info
                @endslot

                @slot('body')
                    Site Info 
                @endslot
            @endcomponent
        </div>
    </div>
@endsection