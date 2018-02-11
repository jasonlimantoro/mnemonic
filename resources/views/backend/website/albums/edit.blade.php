@extends('layouts.submaster')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @component('layouts.panel', ['addButton' => ''])
                @slot('backButton')
                    @component('layouts.backButton', [
                        'text' => 'Show all albums',
                        'url' => route('albums.index')
                    ])
                        
                    @endcomponent
                @endslot
                @slot('title')
                    Album: {{ $album->name}}
                @endslot


                @slot('body')
                <p>Featured Image: </p>
                <img src="{{ $album->featuredImage()->first()['url_cache'] }}" alt="featured-image" class="img-responsive featured-image">
                    <h3>Change Featured Image</h3>
                    <form action="{{ route('albums.update', ['album' => $album->id]) }}" method="POST" enctype="multipart/form-data">
                        {{ method_field('PATCH') }}
                        <div class="__react-root" id="FancyInput"></div>
                        <div class="form-group">
                            <label for="formControlName">Album Name</label>
                            <input 
                                type="text" 
                                class="form-control" 
                                id="formControlName" 
                                name="name"
                                value="{{ $album->name }}"
                            >
                        </div>

                        <div class="form-group">
                            <label for="formControlDescription">Album Description</label>
                            <input
                                type="text" 
                                class="form-control" 
                                id="formControlDescription" 
                                name="description"
                                value="{{ $album->description }}"
                            >
                        </div>

                        <button type="submit" class="btn btn-primary">Publish</button>

                    </form>
                    
                @endslot
            @endcomponent
        </div>
    </div>
@endsection