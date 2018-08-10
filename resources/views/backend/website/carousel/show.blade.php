@extends('backend.layouts.master')

@section('content')
	@component('backend.layouts.breadcrumb', ['current' => 'Main Carousel'])
	@endcomponent
  @component('backend.layouts.panel', [
    'title' => "Main Carousel"
  ])
    @slot('backButton')
      @component('backend.layouts.backButton', [
        'text' => 'All Carousel Images',
        'url' => route('carousel.images.index', ['carousel' => 1]),
      ])
      @endcomponent
    @endslot
    @slot('body')
      <h2> {{ $image->file_name }}</h2>
      <img src="{{ $image->url_cache }}" alt="image" class="img-responsive">
      Uploaded on {{ $image->created_at->toDayDateTimeString() }}

      <h2>Caption</h2>
      <div class="well well-lg">
        @include('backend.layouts.caption')
      </div>
    @endslot
  @endcomponent
@endsection