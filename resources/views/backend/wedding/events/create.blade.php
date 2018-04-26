@extends('layouts.submaster')

@section('content')
  <div class="row">
    <div class="col-md-12">
      @component('layouts.panel', [
        'title' => "Create a new event"
      ])
        @slot('backButton')
          @component('layouts.backButton', [
            'text' => 'Show all events',
            'url' => route('events.index')
          ])
            
          @endcomponent
        @endslot
				@slot('body')
					{{ Form::open([
						'route' => 'events.store', 
						'enctype' => 'multipart/form-data'
						]) 
					}}
						@include('backend.wedding.events.form', [
							'submitButtonText' => 'Publish Event',
							'defaultDateTime' => date('Y-m-d\TH:i')			
						])
					{{ Form::close() }}
        @endslot
      @endcomponent
    </div>
  </div>
@endsection