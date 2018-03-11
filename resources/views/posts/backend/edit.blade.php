@extends('layouts.submaster')

@section('content')
    @component('layouts.panel', ['backButton' => '', 'addButton' => ''])
        @slot('backButton')
            @component('layouts.backButton', [
                'text' => 'Show All Posts in ' . $page->title,
                'url' => route('posts.index', ['page' => $page->id])
            ])
            @endcomponent
        @endslot
        
        @slot('title')
            {{ $page->title }}
        @endslot

        @slot('body')
            <form action="{{ route('posts.update',['post' => $post->id, 'page' => $page->id]) }}" method="POST">
                {{ method_field('PATCH') }}
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}">
                </div>

                <div class="form-group">
                    <label for="body">Body</label>
                    <textarea name="body" class="form-control" id="body" cols="30" rows="10">{{ $post->body }}</textarea>
                </div>

                <div class="form-group">
                    <div id="UpdateButton" class="__react-root"></div>
                </div>
            
            </form>
        @endslot
    @endcomponent
@endsection