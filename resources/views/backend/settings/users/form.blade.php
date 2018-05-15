{{-- name field --}}
<div class="form-group">
	{{ Form::label('name', 'Name:') }}
	{{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Enter name']) }}
</div>

{{-- email field --}}
<div class="form-group">
	{{ Form::label('email', 'Email:') }}
	{{ Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Enter email']) }}
</div>

{{-- password field --}}
<div class="form-group">
	{{ Form::label('password', 'Password:') }}
	{{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'Enter password']) }}
</div>

{{-- role_id field --}}
<div class="form-group">
	{{ Form::label('role_id', 'Role:') }}
	{{ Form::select('role_id', $roles, null, ['class' => 'form-control', 'placeholder' => 'Select role']) }}
</div>

{{-- Submit Button --}}
<div class="form-group">
	{{ Form::submit($submitButtonText, ['class' => 'btn btn-primary']) }}
</div>
