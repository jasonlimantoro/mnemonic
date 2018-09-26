@extends('backend.layouts.master')

@section('content')
	@component('backend.layouts.breadcrumb', ['current' => $image->name])
    <li><a href="{{ route('carousel.images.index', ['carousel' => 1]) }}">Carousel</a></li>
	@endcomponent
  @component('backend.layouts.panel', [
    'title' => "Main Carousel"
  ])
    @slot('body')
      <h2>{{ $image->name }}</h2>
      <img src="{{ $image->urlCache('gallery') }}" alt="image" class="img-responsive">
      <h2>Caption</h2>
      {{ $image->caption() }}
    @endslot
  @endcomponent
@endsection