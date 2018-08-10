@extends('backend.layouts.master')

@section('content')
	@component('backend.layouts.breadcrumb', ['current' => 'RSVP'])
	@endcomponent
  @component('backend.layouts.panel', [
    'title' => "Create a new RSVP"
  ])
    @slot('backButton')
      @component('backend.layouts.backButton', [
        'text' => 'All RSVPs',
        'url' => route('rsvps.index')
      ])
      @endcomponent
    @endslot
		@slot('body')
			{{ Form::open(['route' => 'rsvps.store']) }}
				@include('backend.day.rsvps.form', ['submitButtonText' => 'Add new RSVP'])
			{{ Form::close() }}
    @endslot
  @endcomponent
@endsection