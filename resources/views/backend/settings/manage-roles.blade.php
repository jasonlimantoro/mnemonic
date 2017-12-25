@extends('layouts.submaster')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @component('layouts.panel', ['backButton' => '', 'addButton' => ''])
                @slot('title')
                    Manage Roles
                @endslot

                @slot('body')
                    Manage Roles Body
                @endslot
            @endcomponent
        </div>
    </div>
@endsection