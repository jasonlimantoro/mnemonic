@extends('layouts.submaster')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @component('layouts.panel', [
				'title' => $post->page->title
			])
                @slot('backButton')
                   @component('layouts.backButton', [
                        'text' => 'Show All Posts in ' .  $page->title,
                        'url' => route('posts.index', ['page' => $page->id])
                    ])
                    @endcomponent
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

