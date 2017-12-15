@extends('layouts.submaster')

@section('content')
    @component('layouts.panel')
        @slot('heading')
            <a href="/admin/pages/{{ $page->id }}" class="btn btn-primary">
                <i class="fa fa-angle-left"></i>
                Show All Posts
            </a>
            <h1>{{ $page->title }}</h1>
            Edit Post: <strong> {{ $post->title }} </strong>
        @endslot

        @slot('body')
            <form action="{{ route('admin') }}/posts/{{ $post->id }}/update" method="POST">
                {{ csrf_field() }}
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