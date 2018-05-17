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
					if(isset($role)){
						$allowables = $role->allowables($permission->name);
					}
				@endphp

				@foreach ($permission->action as $action)
					<label style="font-weight:normal">
						<input 
							type="checkbox" 
							name="permission[{{ $permission->id }}][{{ $action }}]"
							{{ isset($allowables) && in_array($action, $allowables) ? 'checked' : '' }}
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
	{{ Form::submit($submitButtonText, ['class' => 'btn btn-primary']) }}
</div>
