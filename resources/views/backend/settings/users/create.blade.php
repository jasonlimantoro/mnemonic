@extends('backend.layouts.master')

@section('content')
	<div class="row">
		<div class="col-md-12">
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
		</div>
	</div>
@endsection