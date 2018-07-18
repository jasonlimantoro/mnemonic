@extends('backend.layouts.master')

@section('content')
  <div class="row">
    <div class="col-md-12">
			@component('backend.layouts.breadcrumb', ['current' => 'Events'])
			@endcomponent
      @component('backend.layouts.panel', [
        'title' => "Event: " . $event->name
      ])
        @slot('backButton')
          @component('backend.layouts.backButton', [
            'text' => 'All Events',
            'url' => route('events.index'),
          ])
            
          @endcomponent 
        @endslot 
				@slot('body')
					{{ Form::model($event, [
							'route' => ['events.update', $event->id], 
							'method' => 'PATCH', 
							])
					}}
						@include('backend.day.events.form', [
							'submitButtonText' => 'Update Event'
						])
					{{ Form::close() }}
        @endslot
      @endcomponent
    </div>
  </div>
@endsection