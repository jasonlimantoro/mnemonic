@extends('layouts.submaster')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @component('layouts.panel', ['backButton' => '', 'addButton' => ''])
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