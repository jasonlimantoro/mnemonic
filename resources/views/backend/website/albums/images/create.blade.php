@extends('backend.layouts.master')

@section('content')
  @component('backend.layouts.breadcrumb', ['current' => 'Upload'])
    <li><a href="{{ subdomainRoute('images.index') }}">Galleries</a></li>
    <li><a href="{{ subdomainRoute('albums.index') }}">Albums</a></li>
    <li><a href="{{ subdomainRoute('albums.show', ['album' => $album->id]) }}">{{ $album->name }}</a></li>
  @endcomponent
  @component('backend.layouts.panel', [
    'title' => 'Album: ' . $album->name
  ])
    @slot('body')
			<p> Description: {{ strip_tags($album->description) }} </p>
			{{ Form::open([
			  'route' => ['album.images.store', env('APP_SUBDOMAIN'), $album->id],
			  'enctype' => 'multipart/form-data'])
			}}

        <div data-component="SimpleInput"></div>

      {{-- featured field --}}
      <div class="form-group">
        {{ Form::label('featured', 'Set this image as featured') }}
        {{ Form::checkbox('featured', '*', false) }}
      </div>

      {{-- Submit Button --}}
      <div class="form-group">
        {{ Form::submit('Create', ['class' => 'btn btn-primary']) }}
      </div>
      {{ Form::close() }}

    @endslot
  @endcomponent
@endsection