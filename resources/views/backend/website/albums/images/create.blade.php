@extends('backend.layouts.master')

@section('content')
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
			<p> Description: {{ strip_tags($album->description) }} </p>
			{{ Form::open(['route' => ['album.images.store', $album->id], 'enctype' => 'multipart/form-data']) }}

        <div data-component="SimpleInput"></div>

      {{-- featured field --}}
      <div class="form-group">
        {{ Form::label('featured', 'Set this image as featured') }}
        {{ Form::checkbox('featured', 'yes', false) }}
      </div>

      {{-- Submit Button --}}
      <div class="form-group">
        {{ Form::submit('Create', ['class' => 'btn btn-primary']) }}
      </div>
      {{ Form::close() }}

    @endslot
  @endcomponent
@endsection