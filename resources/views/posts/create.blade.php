@extends('layouts.submaster')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @component('layouts.panel')
                @slot('heading')
                    Create A Post
                @endslot

                @slot('body')
                    <div id="form">

                    </div>
                @endslot

            @endcomponent
        </div>
    </div>

@endsection

