@extends('layouts.master')

@section('content')
    <div class="col-md-8 blog-post">
        <h2>{{ $post->title }}</h2>

        <p>{{ $post->body }}</p>
	</div>
	<div class="col-md-4">
		<h1>Archives</h1>
		@include('layouts.archives')
	</div>
@endsection