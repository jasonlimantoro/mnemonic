@extends('backend.layouts.master')

@section('content')
	@component('backend.layouts.breadcrumb', ['current' => $user->name])
    <li><a href="{{ subdomainRoute('users.index') }}">Users</a></li>
	@endcomponent
	@component('backend.layouts.panel', ['title' => 'Manage Users'])
		@slot('body')
			{{ Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'PATCH']) }}
				@include('backend.settings.users.form', ['submitButtonText' => 'Update User'])
			{{ Form::close() }}

		@endslot

	@endcomponent
@endsection