@extends('backend.layouts.master')

@section('content')
  <div class="row">
    <div class="col-md-12">
			@component('backend.layouts.breadcrumb', ['current' => 'Gallery'])
			@endcomponent
      @component('backend.layouts.panel', [
        'title' => "Gallery"
      ])
        @slot('backButton')
          @component('backend.layouts.backButton', [
            'text' => 'Show all galleries',
            'url' => route('images.index')
          ])
            
          @endcomponent
        @endslot

				@slot('body')

					{{ Form::open(['route' => 'images.store', 'enctype' => 'multipart/form-data']) }}
						{{--@react("SimpleInput")	--}}
            <div data-component="SimpleInput"
                 data-prop-template="gallery"
            >
            </div>
						{{-- album field --}}
						<div class="form-group">
							{{ Form::label('album', 'Assign to Album:') }}
							{{ Form::select('album', $albums, null, ['class' => 'form-control']) }}
						</div>

						{{-- Submit Button --}}
						<div class="form-group">
							{{ Form::submit('Upload Image', ['class' => 'btn btn-primary']) }}
						</div>
					{{ Form::close() }}

        @endslot
      @endcomponent
    </div>
  </div>
@endsection