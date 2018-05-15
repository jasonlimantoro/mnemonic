@extends('layouts.submaster')

@section('content')
	@component('layouts.panel', ['title' => 'Manage Users'])
		@slot('backButton')
			@component('layouts.backButton', [
				'text' => 'Show all users',
				'url' => route('users.index')
			])
				
			@endcomponent
		@endslot
		@slot('body')
			{{ Form::open(['route' => 'users.store']) }}
				@include('backend.settings.users.form', ['submitButtonText' => 'Create User'])
			{{ Form::close() }}
		@endslot

	@endcomponent
@endsection