@extends('backend.layouts.master')

@section('content')
	@component('backend.layouts.breadcrumb', ['current' => 'Create'])
    <li><a href="{{ subdomainRoute('users.index') }}">Users</a></li>
	@endcomponent
	@component('backend.layouts.panel', ['title' => 'Manage Users'])
		@slot('body')
			{{ Form::open(['route' => ['users.store', env('APP_SUBDOMAIN')]]) }}
				@include('backend.settings.users.form', ['submitButtonText' => 'Create User'])
			{{ Form::close() }}
		@endslot
	@endcomponent
@endsection