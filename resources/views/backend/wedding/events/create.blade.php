@extends('backend.layouts.master')

@section('content')
  <div class="row">
    <div class="col-md-12">
			@component('backend.layouts.breadcrumb', ['current' => 'Events'])
			@endcomponent
      @component('backend.layouts.panel', [
        'title' => "Create a new event"
      ])
        @slot('backButton')
          @component('backend.layouts.backButton', [
            'text' => 'All Events',
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
							'submitButtonText' => 'Publish Event'
						])
					{{ Form::close() }}
        @endslot
      @endcomponent
    </div>
  </div>
@endsection