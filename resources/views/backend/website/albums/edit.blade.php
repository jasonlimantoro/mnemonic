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
                    <form action="{{ route('albums.update', ['album' => $album->id]) }}" method="POST">
                        {{ method_field('PATCH') }}
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