@extends('layouts.submaster')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @component('layouts.panel')
                @slot('heading')
                    @include('layouts.show-all-post-btn')
                    <h1>{{ $post->page->title }}</h1>
                @endslot

                @slot('body')
                    <h2>{{ $post->title }}</h2>
                    <p>{{ $post->body }}</p>
                    <hr>
                    @include('layouts.post-info')
                @endslot

            @endcomponent
        </div>
    </div>

@endsection

