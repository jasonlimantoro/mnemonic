@extends('layouts.submaster')


@section('content')
    <div class="row">
        <div class="col-md-8">
            <h2>List of Posts for {{ $pageName }} page</h2>
            @foreach($posts as $post)
                @include('posts.backend.post')
            @endforeach
        </div>
    </div>
@endsection