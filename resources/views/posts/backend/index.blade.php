@extends('layouts.submaster')

@section('content')
    @component('layouts.panel', ['addButton' => '', 'backButton' => ''])
        @slot('title')
            {{ $page->title }} 
        @endslot

        @slot('addButton')
            @component('layouts.addButton', 
                [
                    'item' => "Post", 
                    'url' => route('posts.create', ['page' => $page->id ])
                ])
            @endcomponent

        @endslot

        @slot('body')
            <h2>Your Published Posts</h2>
            <div id="Search" class="__react-root"></div>
        @endslot

        @component('layouts.table')
            <div class="row">
                <div class="col-md-12">
                    @slot('tableHeader')
                        <tr>
                            <th class="col title">Title</th>
                            <th class="col body">Body</th>
                            <th class="col action">Action</th>
                        </tr>
                    @endslot
            
                    @slot('tableBody')
                        @foreach($posts as $post)
                            @include('posts.backend.post')
                        @endforeach
                    @endslot
            
                </div>
            </div>
        @endcomponent

    @endcomponent
@endsection


