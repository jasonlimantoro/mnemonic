@extends('layouts.submaster')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @component('layouts.panel', [
				'title' => $page->title
			])
                @slot('backButton')
                    {{--  @include('layouts.show-all-post-btn')  --}}
                    @component('layouts.backButton', [
                        'text' => 'Show All Posts in ' .  $page->title,
                        'url' => route('posts.index', ['page' => $page->id])
                    ])
                        
                    @endcomponent
                @endslot

                @slot('body')
                    <form method="POST" action="{{ route('posts.store', ['page' => $page->id ]) }}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Enter Title">
                        </div>

                        <div class="form-group">
                            <label for="body">Body</label>
                            <textarea name="body" class="form-control" id="body" cols="30" rows="10" placeholder="Enter body"></textarea>
                        </div>

                        <div class="form-group">
                            <div id="PublishButton" class="__react-root"></div>
                        </div>
                    
                    </form>
    
                @endslot

            @endcomponent
        </div>
    </div>

@endsection

