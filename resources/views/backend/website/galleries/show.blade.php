@extends('backend.layouts.master')

@section('content')
  @component('backend.layouts.panel', [
    'title' => $image->name
  ])
    @slot('backButton')
      @component('backend.layouts.backButton', [
        'text' => $image->album->name,
        'url' => route('albums.show', ['album' => $image->album->id])
      ])
        
      @endcomponent
    @endslot

    @slot('body')
      <p>
        From album: <strong>{{ $image->album->name }}</strong>
      </p>
      
      <p>
        <img src="{{ $image->urlCache('gallery') }}" alt="image_album" class="img-responsive">
      </p>
      Uploaded on {{ $image->created_at->toDayDateTimeString() }}
    @endslot
  @endcomponent
@endsection