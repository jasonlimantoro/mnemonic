@extends('layouts.submaster')

@section('content')
	<div class="row">
		<div class="col-md-12">
			@component('layouts.breadcrumb', ['current' => 'Roles'])
			@endcomponent
			@component('layouts.panel', [
				'title' => "Edit Role"
			])
			@slot('backButton')
				@component('layouts.backButton', [
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
		</div>
	</div>
@endsection