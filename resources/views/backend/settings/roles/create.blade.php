@extends('layouts.submaster')

@section('content')
<div class="row">
    <div class="col-md-12">
      @component('layouts.panel', [
        'title' => "Edit Role"
			])
			@slot('backButton')
				@component('layouts.backButton', [
					'text' => 'Show all roles',
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