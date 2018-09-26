@extends('backend.layouts.master')

@section('content')
  @component('backend.layouts.breadcrumb', ['current' => $image->name])
    <li><a href="{{ subdomainRoute('images.index') }}">Galleries</a></li>
    <li><a href="{{ subdomainRoute('albums.index') }}">Albums</a></li>
    <li><a href="{{ subdomainRoute('albums.show', ['album' => $image->album->id ]) }}">{{ $image->album->name }}</a></li>
  @endcomponent
  @component('backend.layouts.panel', [
    'title' => $image->name
  ])

    @slot('body')
      <p>
        From album: <strong>{{ $image->album->name }}</strong>
      </p>
      
      <p>
        <img src="{{ $image->urlCache('gallery') }}" alt="image_album" class="img-responsive">
      </p>
    @endslot
  @endcomponent
@endsection