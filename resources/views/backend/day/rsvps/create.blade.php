@extends('backend.layouts.master')

@section('content')
	@component('backend.layouts.breadcrumb', ['current' => 'Create'])
    <li><a href="{{ route('rsvps.index') }}">RSVP</a></li>
	@endcomponent
  @component('backend.layouts.panel', [
    'title' => "Create a new RSVP"
  ])
		@slot('body')
			{{ Form::open(['route' => 'rsvps.store']) }}
				@include('backend.day.rsvps.form', ['submitButtonText' => 'Add new RSVP'])
			{{ Form::close() }}
    @endslot
  @endcomponent
@endsection