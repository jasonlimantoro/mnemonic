@extends('layouts.submaster')

@section('content')
  <div class="row">
    <div class="col-md-12">
      @component('layouts.panel', [
        'title' => 'Album: ' . $album->name
      ])
        @slot('backButton')
          @component('layouts.backButton', [
            'text' => $album->name,
            'url' => route('albums.show', ['album' => $album->id])
          ])
          @endcomponent
        @endslot
        @slot('body')
					<p> Description: <strong>{{ $album->description }}</strong> </p>
					{{ Form::open(['route' => ['album.images.store', $album->id], 'enctype' => 'multipart/form-data']) }}

						<div class="__react-root" id="SimpleInput"></div>

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