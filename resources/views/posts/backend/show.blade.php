@extends('layouts.submaster')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @component('layouts.panel', ['backButton' => '', 'addButton' => ''])
                @slot('backButton')
                    @include('layouts.show-all-post-btn')
                @endslot
                
                @slot('title')
                    {{ $post->page->title }}
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

