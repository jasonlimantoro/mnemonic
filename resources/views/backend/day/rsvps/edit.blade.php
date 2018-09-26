@extends('backend.layouts.master')

@section('content')
	@component('backend.layouts.breadcrumb', ['current' => $rsvp->name])
    <li><a href="{{ route('rsvps.index') }}">RSVP</a></li>
	@endcomponent
  @component('backend.layouts.panel', [
    'title' => "Edit a RSVP"
  ])
		@slot('body')
			{{ Form::model($rsvp, ['route' => ['rsvps.update', $rsvp->id], 'method' => 'PATCH']) }}
				@include('backend.day.rsvps.form', ['submitButtonText' => 'Update RSVP'])
			{{ Form::close() }}
    @endslot
  @endcomponent
@endsection