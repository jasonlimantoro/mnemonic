@extends('layouts.master')


@section('content')
    <div class="row">
        <div class="col-md-12">
            <h2>List of Posts in About US</h2>
            <div class="row">
                @foreach($posts as $post)
                    @include('posts.frontend.post')
                @endforeach
            </div>
        </div>
    </div>
@endsection