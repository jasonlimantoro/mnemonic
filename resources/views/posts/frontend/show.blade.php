@extends('layouts.master')


@section('content')
    <div class="col-md-8 blog-post">
        <h2>{{ $post->title }}</h2>

        <p>{{ $post->body }}</p>
    
    </div>
@endsection