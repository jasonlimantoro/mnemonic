@extends('layouts.submaster')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @component('layouts.panel')
                @slot('heading')
                   <h1>Albums</h1>
                @endslot

                @slot('body')
                    @include('backend.website.albums.index')
                @endslot
            @endcomponent
        </div>
    </div>
@endsection