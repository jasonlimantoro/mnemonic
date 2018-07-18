@extends('backend.layouts.master')

@section('content')
	@component('backend.layouts.breadcrumb', ['current' => 'Users'])
	@endcomponent
	@component('backend.layouts.panel', [
		'title' => "Users"
	])
		@can('create', App\User::class)
			@slot('addButton')
				@component('backend.layouts.addButton', [
					'url' => route('users.create'),
				])
				@endcomponent
			@endslot
		@endcan

		@slot('body')
			@component('backend.layouts.query', [
				'title' => 'Name',
				'body' => 'Description'
			])
					
			@endcomponent
			@component('layouts.table')
				@slot('tableHeader')
					<tr>
						<th class="col-xs-3 title">Name</th>
						<th class="col-xs-6 body">Role</th>
						<th class="col-xs-1 action">Action</th>
					</tr>
				@endslot
		
				@slot('tableBody')
					@foreach($users as $user)
						@include('backend.settings.users.user')
					@endforeach
				@endslot
		
			@endcomponent
		@endslot
	@endcomponent
@endsection