@extends('backend.layouts.master')

@section('content')
	@component('backend.layouts.breadcrumb', ['current' => 'Create'])
    <li><a href="{{ subdomainRoute('images.index') }}">Galleries</a></li>
	@endcomponent
  @component('backend.layouts.panel', [
    'title' => "Upload Image"
  ])
		@slot('body')

			{{ Form::open(['route' => ['images.store', env('APP_SUBDOMAIN')], 'enctype' => 'multipart/form-data']) }}
        <div data-component="SimpleInput"
             data-prop-template="gallery"
        >
        </div>
				{{-- album field --}}
      <div class="form-group">
        <label for="album">Assign to album: </label>
        <select name="album_id" id="album" class="form-control">
          <option disabled>Select Album</option>
          <option value="">Uncategorized</option>
          @foreach($albums as $album)
            <option value="{{ $album->id }}">{{ $album->name }}</option>
          @endforeach
        </select>
      </div>

        {{-- featured field --}}
        <div class="form-group">
          {{ Form::label('featured', 'Set this image as featured:') }}
          {{ Form::checkbox('featured', '*', false) }}
        </div>

				{{-- Submit Button --}}
				<div class="form-group">
					{{ Form::submit('Upload Image', ['class' => 'btn btn-primary']) }}
				</div>
			{{ Form::close() }}

    @endslot
  @endcomponent
@endsection