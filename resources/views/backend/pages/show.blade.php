@extends('layouts.submaster')

@section('content')
    @component('layouts.panel')
        @slot('heading')
            A place to edit post in  {{ $page->title }}
        @endslot

        @slot('body')
            @foreach($page->posts as $post)
                <h2> <a href="{{ route('admin') }}/posts/{{ $post->id }}/edit"> {{ $post->title }} </a></h2>
                <p>{{ $post->body }}</p>
            @endforeach
        @endslot
    @endcomponent
@endsection