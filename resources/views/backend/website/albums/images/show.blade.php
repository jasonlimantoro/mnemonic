@extends('layouts.submaster')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @component('layouts.panel')
                @slot('backButton')
                    @component('layouts.backButton', [
                        'text' => 'Back',
                        'url' => url()->previous()
                    ])
                        
                    @endcomponent
                @endslot
                @slot('title')
                    {{ $image->file_name }}
                @endslot

                @slot('addButton')
                    @component('layouts.addButton', [
                        'url' => '#',
                        'item' => 'images'
                    ])
                        
                    @endcomponent
                @endslot

                @slot('body')
                    <p>
                        From album: <strong>{{ $album->name }}</strong> 
                    </p>

                    <img src="{{ $image->url_cache }}" alt="image_album" class="img-responsive">
                @endslot
            @endcomponent
        </div>
    </div>
@endsection