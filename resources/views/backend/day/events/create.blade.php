@extends('backend.layouts.master')

@section('content')
  @component('backend.layouts.breadcrumb', ['current' => 'Create'])
    <li><a href="{{ route('events.index') }}">Events</a></li>
  @endcomponent
  @component('backend.layouts.panel', [
    'title' => "Create a new event"
  ])
		@slot('body')
			{{ Form::open([ 'route' => 'events.store']) }}
				@include('backend.day.events.form', [
					'submitButtonText' => 'Publish Event'
				])
			{{ Form::close() }}
    @endslot
  @endcomponent
@endsection