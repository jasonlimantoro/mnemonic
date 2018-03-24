@extends('layouts.submaster')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @component('layouts.panel', [
				'title' => 'Create a new album'
			])
                @slot('backButton')
                    @component('layouts.backButton', [
                        'text' => 'Show all albums',
                        'url' => route('albums.index')
                    ])
                    @endcomponent
                @endslot

                @slot('body')
                    <form action="{{ route('albums.store') }}" method="POST">
                        <div class="form-group">
                            <label for="formControlName">Album Name</label>
                            <input 
                                type="text" 
                                class="form-control" 
                                id="formControlName" 
                                name="name"
                            >
                        </div>

                        <div class="form-group">
                            <label for="formControlDescription">Album Description</label>
                            <input
                                type="text" 
                                class="form-control" 
                                id="formControlDescription" 
                                name="description"
                            >
                        </div>

                        <button type="submit" class="btn btn-primary">Publish</button>

                    </form>
                    
                @endslot
            @endcomponent
        </div>
    </div>
@endsection