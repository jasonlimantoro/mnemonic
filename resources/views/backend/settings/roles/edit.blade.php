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
					{{ Form::model($role, ['route' => ['roles.update', $role->id ], 'method' => 'PATCH']) }}
						{{-- name field --}}
						<div class="form-group">
							{{ Form::label('name', 'Name:') }}
							{{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Enter Name']) }}
						</div>	

						{{-- description field --}}
						<div class="form-group">
							{{ Form::label('description', 'Description:') }}
							{{ Form::text('description', null, ['class' => 'form-control', 'placeholder' => 'Enter Description']) }}
						</div>

						<div class="form-group">
							<b>Permissions:</b>
							<ul class="list-unstyled">
								@foreach ($permissions as $permission)
									<li>
										<b>{{ $permission->name }}</b><br>
										@php
												$allowables = $role->allowables($permission->name)
										@endphp

										@foreach ($permission->action as $action)
											<label style="font-weight:normal">
												<input 
													type="checkbox" 
													name="permission[{{ $permission->id }}][{{ $action }}]"
													{{ in_array($action, $allowables) ? 'checked' : '' }}
												>
												{{ $action }}
											</label>	
										@endforeach
									</li>
								@endforeach
							</ul>
						</div>

						{{-- Submit Button --}}
						<div class="form-group">
							{{ Form::submit('Update', ['class' => 'btn btn-primary']) }}
						</div>

					{{ Form::close() }}
        @endslot
      @endcomponent
    </div>
  </div>
@endsection