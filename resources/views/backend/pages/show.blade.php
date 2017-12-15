@extends('layouts.submaster')

@section('content')
    @component('layouts.panel')
        @slot('heading')
            {{--  <a href="/admin/pages/{{ $page->id }}" class="btn btn-primary">
                <i class="fa fa-angle-left"></i>
            </a>  --}}
            <h1 class="title">{{ $page->title }} 
                <a href="{{ route('post.create', ['page' => $page->id ]) }}" class="pull-right">
                    <div class="__react-root" id="AddNewPostButton">
                    </div>
                </a>
            </h1>
        @endslot

        @slot('body')
            <h2>Your Published Posts</h2>
        @endslot

        @component('layouts.table')
            @include('posts.backend.index')
        @endcomponent

    @endcomponent
@endsection