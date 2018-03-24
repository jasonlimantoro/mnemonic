@extends('layouts.submaster')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @component('layouts.panel')
                @slot('title')
                    Bridesmaid and bestman
                @endslot

                @slot('body')
                    Bridesmaid and bestman body
                @endslot
            @endcomponent
        </div>
    </div>
@endsection