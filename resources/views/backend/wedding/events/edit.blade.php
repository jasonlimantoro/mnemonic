@extends('layouts.submaster')

@section('content')
  <div class="row">
    <div class="col-md-12">
			@component('layouts.breadcrumb', ['current' => 'Events'])
			@endcomponent
      @component('layouts.panel', [
        'title' => "Event: " . $event->name
      ])
        @slot('backButton')
          @component('layouts.backButton', [
            'text' => 'All Events',
            'url' => route('events.index'),
          ])
            
          @endcomponent 
        @endslot 
				@slot('body')
					{{ Form::model($event, [
							'route' => ['events.update', $event->id], 
							'method' => 'PATCH', 
							'enctype'=>'multipart/form-data'
							]) 
					}}
						@include('backend.wedding.events.form', [
							'submitButtonText' => 'Update Event'
						])
					{{ Form::close() }}
        @endslot
      @endcomponent
    </div>
  </div>
@endsection