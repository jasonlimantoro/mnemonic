@extends('layouts.submaster')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @component('layouts.panel', [
				'title' => $image->file_name
			])
                @slot('backButton')
                    @component('layouts.backButton', [
                        'text' => $album->name,
                        'url' => route('albums.show', ['album' => $album->id]) 
                    ])
                        
                    @endcomponent
                @endslot

                @slot('body')
                    <p>
                        From album: <strong>{{ $album->name }}</strong> 
					</p>
					
					<p>
						<img src="{{ $image->url_cache }}" alt="image_album" class="img-responsive">
					</p>

					
                    Uploaded on {{ $image->created_at->toDayDateTimeString() }}
                @endslot
            @endcomponent
        </div>
    </div>
@endsection