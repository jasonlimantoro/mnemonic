@extends('layouts.submaster')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @component('layouts.panel')
                @slot('heading')
                    About Us Title
                @endslot

                @slot('body')
                    About Us Body
                @endslot
            @endcomponent
        </div>
    </div>
@endsection