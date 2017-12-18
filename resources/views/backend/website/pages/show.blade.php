@extends('layouts.submaster')

@section('content')
    @component('layouts.panel')
        @slot('heading')
            <h1 class="title">{{ $page->title }} 
                <a href="{{ route('post.create', ['page' => $page->id ]) }}" class="pull-right btn btn-success">
                    <i class="fa fa-plus"></i>
                    Add a New Post
                </a>
            </h1>
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