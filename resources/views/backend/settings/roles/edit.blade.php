@extends('backend.layouts.master')

@section('content')
	@component('backend.layouts.breadcrumb', ['current' => 'Roles'])
	@endcomponent
	@component('backend.layouts.panel', [
		'title' => "Edit Role"
	])
	@slot('backButton')
		@component('backend.layouts.backButton', [
			'text' => 'All roles',
			'url' => route('roles.index')
		])
			
		@endcomponent
	@endslot
		@slot('body')
			{{ Form::model($role, ['route' => ['roles.update', $role->id ], 'method' => 'PATCH']) }}
				@include('backend.settings.roles.form', ['submitButtonText' => 'Update Role'])
			{{ Form::close() }}
		@endslot
	@endcomponent
@endsection