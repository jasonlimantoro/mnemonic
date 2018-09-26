@extends('backend.layouts.master')

@section('content')
	@component('backend.layouts.breadcrumb', ['current' => $event->name])
    <li><a href="{{ route('events.index') }}">Events</a></li>
	@endcomponent
  @component('backend.layouts.panel', [
    'title' => "Event: " . $event->name
  ])
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
@endsection