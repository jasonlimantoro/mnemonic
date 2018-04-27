@extends('layouts.submaster')

@section('content')
  <div class="row">
    <div class="col-md-12">
      @component('layouts.panel', [
        'title' => "Gallery"
      ])
        @slot('backButton')
          @component('layouts.backButton', [
            'text' => 'Show all galleries',
            'url' => route('images.index')
          ])
            
          @endcomponent
        @endslot

				@slot('body')

					{{ Form::open(['route' => 'images.store', 'enctype' => 'multipart/form-data']) }}
						<div class="__react-root" id="SimpleInput"></div>	
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