@extends('layouts.submaster')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @component('layouts.panel')
                @slot('heading')
                    Vendors page
                @endslot

                @slot('body')
                    Vendors body
                @endslot
            @endcomponent
        </div>
    </div>
@endsection