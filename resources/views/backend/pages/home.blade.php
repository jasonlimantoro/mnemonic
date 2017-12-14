@extends('layouts.submaster')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @component('layouts.panel')
                @slot('heading')
                    Home page
                @endslot

                @slot('body')
                    <div id="FormContainer"></div>
                @endslot
            @endcomponent
        </div>
    </div>
@endsection