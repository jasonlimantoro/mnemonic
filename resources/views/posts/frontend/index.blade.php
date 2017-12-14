@extends('layouts.master')


@section('content')
    <div class="col-md-8">
        <h2>List of Posts</h2>
        @foreach($posts as $post)
            @include('posts.frontend.post')
        @endforeach
    </div>
@endsection