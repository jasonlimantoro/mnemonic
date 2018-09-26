@extends('backend.layouts.master')

@section('content')
  @component('backend.layouts.breadcrumb', ['current' => $role->name])
    <li><a href="{{ subdomainRoute('roles.index') }}">Roles</a></li>
  @endcomponent
	@component('backend.layouts.panel', [
		'title' => "Edit Role"
	])
		@slot('body')
			{{ Form::model($role, ['route' => ['roles.update', $role->id ], 'method' => 'PATCH']) }}
				@include('backend.settings.roles.form', ['submitButtonText' => 'Update Role'])
			{{ Form::close() }}
		@endslot
	@endcomponent
@endsection