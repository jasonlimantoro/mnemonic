@extends('backend.layouts.master')

@section('content')
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
      <div class="row">
        <div class="col-xs-12 col-md-6">
          <p>From album: <strong>{{ $album->name }}</strong></p>

          {{ Form::open(['route' => ['album.images.update', $album->id, $image->id], 'method' => 'PATCH']) }}

          {{-- name field --}}
          <div class="form-group">
            {{ Form::label('name', 'Name:') }}
            <div class="input-group">
              {{ Form::text('name', $filename, ['class' => 'form-control', 'placeholder' => 'Enter Filename']) }}
              <div class="input-group-addon">.{{ $ext }}</div>
            </div>
          </div>

          {{-- album field --}}
          <div class="form-group">
            {{ Form::label('album', 'Assign to Album:') }}
            {{ Form::select('album', $albums, $album->id, ['class' => 'form-control']) }}
          </div>

          {{-- featured field --}}
          <div class="form-group">
            {{ Form::label('featured', 'Set this as featured:') }}
            {{ Form::checkbox('featured', '*', $image->isFeatured()) }}
          </div>

          {{-- Submit Button --}}
          <div class="form-group">
            {{ Form::submit('Publish', ['class' => 'btn btn-primary']) }}
          </div>
          {{ Form::close() }}

        </div>
        <div class="col-xs-12 col-md-6">
          <img src="{{ $image->urlCache('gallery') }}" alt="image" class="img-responsive">
        </div>
      </div>

    @endslot
  @endcomponent
@endsection