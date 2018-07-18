@extends('backend.layouts.master')

@section('content')
  <div class="row">
    <div class="col-md-12">
      @component('backend.layouts.panel', [
        'title' => 'Album: ' . $album->name
      ])
        @slot('backButton')
          @component('backend.layouts.backButton', [
            'text' => $album->name,
            'url' => route('albums.show', ['album' => $album->id])
          ])
          @endcomponent
        @endslot
        @slot('body')
					<p> Description: <strong>{{ $album->description }}</strong> </p>
					{{ Form::open(['route' => ['album.images.store', $album->id], 'enctype' => 'multipart/form-data']) }}

            <div data-component="SimpleInput"
                 data-prop-template="gallery"
            >
            </div>

						{{-- Submit Button --}}
						<div class="form-group">
							{{ Form::submit('Create', ['class' => 'btn btn-primary']) }}
						</div>
					{{ Form::close() }}

        @endslot
      @endcomponent
    </div>
  </div>
@endsection