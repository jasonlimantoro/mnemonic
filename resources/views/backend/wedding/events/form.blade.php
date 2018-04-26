<div class="row">
	<div class="col-md-6">
		<div class="form-group">
			{{ Form::label('name', 'Event Name') }}
			{{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Enter Name']) }}
		</div>

		<div class="form-group">
			{{ Form::label('description', 'Event Description') }}
			{{ Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'Enter Description']) }}
		</div>

		<div class="form-group">
			{{ Form::label('location', 'Event Location') }}
			{{ Form::text('location', null, ['class' => 'form-control', 'placeholder' => 'Enter Location']) }}
		</div>

		<div class="form-group">
			{{ Form::label('datetime', 'Event Datetime') }}
			{{ Form::input('datetime-local', 'datetime', $defaultDateTime, ['class' => 'form-control', 'placeholder' => 'Enter Datetime']) }}
		</div>

		<div class="form-group">
			{{ Form::submit($submitButtonText, ['class' => 'btn btn-primary']) }}
		</div>

	</div>
	<div class="col-md-6">
		<div class="form-group">
			<div class="__react-root" id="FancyInput"></div>
		</div>
	</div>
</div>