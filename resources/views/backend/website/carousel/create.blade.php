@extends('layouts.submaster')

@section('content')
  <div class="row">
    <div class="col-md-12">
      @component('layouts.panel', [
        'title' => "Add an Image"
      ])
        @slot('backButton')
          @component('layouts.backButton', [
            'text' => 'Back',
            'url' => route('carousels.index', ['carousel' => 1]),
          ])
          @endcomponent
        @endslot
        @slot('body')
					{{ Form::open(['route' => ['carousel.images.store', 1], 'enctype' => 'multipart/form-data']) }}

						@include('backend.website.carousel.form', ['submitButtonText' => 'Publish'])

					{{ Form::close() }}
        @endslot
      @endcomponent
    </div>
  </div>
@endsection
