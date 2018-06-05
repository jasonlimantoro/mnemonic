@extends('backend.layouts.master')

@section('content')
<div class="row">
	<div class="col-md-12">
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
					{{ Form::open(['route' => 'roles.store']) }}
						@include('backend.settings.roles.form', ['submitButtonText' => 'Create Role'])
					{{ Form::close() }}
        @endslot
      @endcomponent
	</div>
</div>
@endsection