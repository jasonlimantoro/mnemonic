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
			{{ Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'PATCH']) }}
				@include('backend.settings.users.form', ['submitButtonText' => 'Update User'])
			{{ Form::close() }}

		@endslot

	@endcomponent
@endsection