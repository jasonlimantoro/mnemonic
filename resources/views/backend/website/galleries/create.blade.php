@extends('layouts.submaster')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @component('layouts.panel', ['backButton' => '', 'addButton' => ''])
                @slot('backButton')
                    @component('layouts.backButton')
                        @slot('url')
                            {{ route('gallery.index') }}
                        @endslot
                        @slot('text')
                            Back
                        @endslot
                    @endcomponent
                @endslot

                @slot('title')
                    Gallery
                @endslot

                @slot('body')
                    <div class="__react-root" id="AlbumForm">

                    </div>
                    
                @endslot
            @endcomponent
        </div>
    </div>
@endsection