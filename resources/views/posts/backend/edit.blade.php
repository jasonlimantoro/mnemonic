@extends('layouts.submaster')

@section('content')
    @component('layouts.panel')
        @slot('heading')
            A place to edit post {{ $post->id }}
        @endslot

        @slot('body')
            Edit here
        @endslot
    @endcomponent
@endsection