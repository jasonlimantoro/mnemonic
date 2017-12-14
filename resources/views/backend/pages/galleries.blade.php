@extends('layouts.submaster')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @component('layouts.panel')
                @slot('heading')
                    Gallery page
                @endslot

                @slot('body')
                    Gallery body
                @endslot
            @endcomponent
        </div>
    </div>
@endsection