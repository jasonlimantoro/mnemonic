@extends('layouts.submaster')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @component('layouts.panel', ['backButton' => '', 'addButton' => ''])
                @slot('title')
                    Manage Administrator
                @endslot

                @slot('body')
                    Administrator Body
                @endslot
            @endcomponent
        </div>
    </div>
@endsection