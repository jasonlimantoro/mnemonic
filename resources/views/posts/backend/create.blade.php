@extends('layouts.submaster')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @component('layouts.panel')
                @slot('heading')
                    <a href="{{ route('pages.show', ['page' => $page->id]) }}" class="btn btn-primary">
                        <i class="fa fa-angle-left"></i>
                        Show All Posts
                    </a>
                    <h1>{{ $page->title }}</h1>
                    <p>Create a post for <strong>{{ $page->title }}</strong> page</p>
                @endslot

                @slot('body')
                    <form method="POST" action="{{ route('post.store', ['page' => $page->id ]) }}">
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
                    {{--  <div id="FormforHome" class="__react-root">

                    </div>  --}}
                @endslot

            @endcomponent
        </div>
    </div>

@endsection

