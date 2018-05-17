@extends('layouts.submaster')

@section('content')
  <div class="row">
    <div class="col-md-12">
      @component('layouts.panel', [
        'title' => "Main Carousel"
      ])
        @slot('backButton')
          @component('layouts.backButton', [
            'text' => 'Back',
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
            @include('layouts.caption')
          </div>
        @endslot
      @endcomponent
    </div>
  </div>
@endsection