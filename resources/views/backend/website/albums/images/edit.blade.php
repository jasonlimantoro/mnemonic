@extends('backend.layouts.master')

@section('content')
  <div class="row">
    <div class="col-md-12">
      @component('backend.layouts.panel', [
        'title' => "Edit Album Image"
      ])
        @slot('backButton')
          @component('backend.layouts.backButton', [
            'text' => $album->name,
            'url' => route('albums.show', [ 'album' => $album->id ])
          ])
          @endcomponent
        @endslot

        @slot('body')
          <p>From album: <strong>{{ $album->name }}</strong></p>
          <img src="{{ $image->url_cache }}" alt="image" class="img-responsive">

          {{ Form::open(['route' => ['album.images.update', $album->id, $image->id], 'method' => 'PATCH']) }}

          {{-- file_name field --}}
          <div class="form-group">
            {{ Form::label('file_name', 'Filename:') }}
            <div class="input-group">
              {{ Form::text('file_name', $filename, ['class' => 'form-control', 'placeholder' => 'Enter Filename']) }}
              <div class="input-group-addon">.{{ $ext }}</div>
            </div>
          </div>

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