@extends('layouts.submaster')

@section('content')
    @component('layouts.panel', ['addButton' => '', 'backButton' => ''])
        @slot('title')
            {{ $page->title }} 
        @endslot

        @slot('addButton')
            @component('layouts.addButton', 
                [
                    'item' => "Post", 
                    'url' => route('post.create', ['page' => $page->id ])
                ])
            @endcomponent

        @endslot

        @slot('body')
            <h2>Your Published Posts</h2>
            <div id="Search" class="__react-root"></div>
        @endslot

        @component('layouts.table')
            @include('posts.backend.index')
        @endcomponent

    @endcomponent
@endsection