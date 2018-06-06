@extends('backend.layouts.master')

@section('content')
	<div class="row">
		<div class="col-md-12">
			@component('backend.layouts.breadcrumb', ['current' => 'Users'])
			@endcomponent
			@component('backend.layouts.panel', ['title' => 'Manage Users'])
				@slot('backButton')
					@component('backend.layouts.backButton', [
						'text' => 'All users',
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
		</div>
	</div>
@endsection