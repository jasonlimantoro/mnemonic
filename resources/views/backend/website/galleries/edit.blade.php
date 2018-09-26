@extends('backend.layouts.master')

@section('content')
  @component('backend.layouts.breadcrumb', ['current' => $image->name ])
    <li><a href="{{ subdomainRoute('images.index') }}">Galleries</a></li>
    <li><a href="{{ subdomainRoute('albums.index') }}">Albums</a></li>
    <li><a href="{{ subdomainRoute('albums.show', ['album' => $image->album->id]) }}">{{ $image->album->name }}</a></li>
  @endcomponent
  @component('backend.layouts.panel', [
    'title' => "Edit Image"
  ])
    @slot('body')
      <div class="row">
        <div class="col-xs-12 col-md-6">
          <p>From album: <strong>{{ $image->album->name }}</strong></p>

          {{ Form::open(['route' => ['images.update', env('APP_SUBDOMAIN'), $image->id], 'method' => 'PATCH']) }}

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
            <label for="album">Album: </label>
            <select name="album_id" id="album" class="form-control">
              <option disabled>Select Album</option>
              <option value="">Uncategorized</option>
              @foreach($albums as $album)
                <option value="{{ $album->id }}" {{ $album->id === $image->album->id ? 'selected' : '' }}>{{ $album->name }}</option>
              @endforeach
            </select>
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