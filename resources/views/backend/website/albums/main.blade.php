@extends('layouts.submaster')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @component('layouts.panel', [
				'title' => 'Albums'
			])
                @slot('addButton')
                    @component('layouts.addButton', [
                        'url' => route('albums.create'),
                        'item' => 'album'
                    ])
                    @endcomponent
                @endslot

                @slot('body')
                    @include('backend.website.albums.index')
                @endslot
            @endcomponent
        </div>
    </div>
@endsection