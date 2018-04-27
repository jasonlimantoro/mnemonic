<div class="row">
	<div class="col-md-6">
		{{-- name field --}}
		<div class="form-group">
			{{ Form::label('name', 'Name:') }}
			{{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Enter Name']) }}
		</div>

		{{-- email field --}}
		<div class="form-group">
			{{ Form::label('email', 'Email:') }}
			{{ Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Enter Email']) }}
		</div>

		{{-- total_invitation field --}}
		<div class="form-group">
			{{ Form::label('total_invitation', 'Total Invitation:') }}
			{{ Form::number('total_invitation', null, ['class' => 'form-control', 'placeholder' => 'Enter Total Invitation']) }}
		</div>
	</div>
	
	<div class="col-md-6">
		{{-- phone field --}}
		<div class="form-group">
			{{ Form::label('phone', 'Phone Number:') }}
			{{ Form::text('phone', null, ['class' => 'form-control', 'placeholder' => 'Enter Phone Number']) }}
		</div>

		{{-- table_name field --}}
		<div class="form-group">
			{{ Form::label('table_name', 'Table Name:') }}
			{{ Form::text('table_name', null, ['class' => 'form-control', 'placeholder' => 'Enter Table Name']) }}
		</div>
	</div>
</div>

{{-- Submit Button --}}
<div class="form-group">
	{{ Form::submit($submitButtonText, ['class' => 'btn btn-primary']) }}
</div>