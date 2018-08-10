@extends('backend.layouts.master')

@section('content')
	@component('backend.layouts.breadcrumb', ['current' => 'Users'])
	@endcomponent
	@component('backend.layouts.panel', ['title' => 'Manage Users'])
		@slot('backButton')
			@component('backend.layouts.backButton', [
				'text' => 'All Users',
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