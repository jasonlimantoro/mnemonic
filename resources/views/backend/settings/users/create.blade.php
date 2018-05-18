@extends('layouts.submaster')

@section('content')
	<div class="row">
		<div class="col-md-12">
			@component('layouts.breadcrumb', ['current' => 'Users'])
			@endcomponent
			@component('layouts.panel', ['title' => 'Manage Users'])
				@slot('backButton')
					@component('layouts.backButton', [
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
		</div>
	</div>
@endsection