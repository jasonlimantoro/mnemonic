@extends('layouts.submaster')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @component('layouts.panel', ['backButton' => '', 'addButton' => ''])
                @slot('title')
                   Albums
                @endslot

                @slot('body')
                    @include('backend.website.albums.index')
                @endslot
            @endcomponent
        </div>
    </div>
@endsection