@extends('backend.layouts.master')

@section('content')
  <div class="row">
    <div class="col-md-12">
      @component('backend.layouts.panel', [
        'title' => "Edit Album Image"
      ])
        @slot('backButton')
          @component('backend.layouts.backButton', [
            'text' => $selectedAlbum->name,
            'url' => route('albums.show', [ 'album' => $selectedAlbum->id ])
          ])
          @endcomponent
        @endslot

        @slot('body')
          <h2> {{ $image->file_name }}</h2>
          <p>From album: <strong>{{ $selectedAlbum->name }}</strong></p>
          <img src="{{ $image->url_cache }}" alt="image" class="img-responsive">

					{{ Form::open(['route' => ['album.images.update', $album->id, $image->id], 'method' => 'PATCH']) }}
						{{-- album field --}}
						<div class="form-group">
							{{ Form::label('album', 'Assign to Album:') }}
							{{ Form::select('album', $albums, $album->id, ['class' => 'form-control']) }}
						</div>
						
						{{-- Submit Button --}}
						<div class="form-group">
							{{ Form::submit('Publish', ['class' => 'btn btn-primary']) }}
						</div>
					{{ Form::close() }}
        @endslot
      @endcomponent
    </div>
  </div>
@endsection