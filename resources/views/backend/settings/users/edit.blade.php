@extends('layouts.submaster')

@section('content')
	<div class="row">
		<div class="col-md-12">
			@component('layouts.breadcrumb', ['current' => 'Users'])
			@endcomponent
			@component('layouts.panel', ['title' => 'Manage Users'])
				@slot('backButton')
					@component('layouts.backButton', [
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