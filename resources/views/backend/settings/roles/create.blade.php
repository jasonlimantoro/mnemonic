@extends('backend.layouts.master')

@section('content')
  @component('backend.layouts.breadcrumb', ['current' => 'Create'])
    <li><a href="{{ route('roles.index') }}">Roles</a></li>
  @endcomponent
  @component('backend.layouts.panel', [
    'title' => "Edit Role"
  ])
		@slot('body')
			{{ Form::open(['route' => 'roles.store']) }}
				@include('backend.settings.roles.form', ['submitButtonText' => 'Create Role'])
			{{ Form::close() }}
    @endslot
  @endcomponent
@endsection