@extends('layouts.submaster')

@section('content')
    @component('layouts.panel')
        @slot('heading')
            {{--  <a href="/admin/pages/{{ $page->id }}" class="btn btn-primary">
                <i class="fa fa-angle-left"></i>
            </a>  --}}
            <h1 class="title">{{ $page->title }} 
                <a href="/admin/pages/{{ $page->id }}/posts/create" class="pull-right">
                    <div class="__react-root" id="AddNewPostButton">
                    </div>
                </a>
            </h1>
        @endslot

        @slot('body')
            @foreach($posts as $post)
                @include('posts.backend.post')
                {{--  <h2> <a href="{{ route('admin') }}/posts/{{ $post->id }}/edit"> {{ $post->title }} </a></h2>
                <p>{{ $post->body }}</p>  --}}
            @endforeach
        @endslot
    @endcomponent
@endsection