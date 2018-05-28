<div class="col-md-8">
	{{-- name field --}}
	<div class="form-group">
		{{ Form::label('name', 'Event Name') }}
		{{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Enter Name']) }}
	</div>

	{{-- description field --}}
	<div class="__react-root" id="InitializeEditor"></div>
	<div class="form-group">
		{{ Form::label('description', 'Event Description') }}
		{{ Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'Enter Description']) }}
	</div>

	{{-- location field --}}
	<div class="form-group">
		{{ Form::label('location', 'Event Location') }}
		{{ Form::text('location', null, ['class' => 'form-control', 'placeholder' => 'Enter Location']) }}
	</div>

	{{-- datetime field --}}
	<div class="form-group">
		{{ Form::label('datetime', 'Event Datetime') }}
		{{ Form::input('datetime-local', 'datetime', null, ['class' => 'form-control', 'placeholder' => 'Enter Datetime']) }}
	</div>

	<div class="form-group">
		{{ Form::submit($submitButtonText, ['class' => 'btn btn-primary']) }}
	</div>

</div>
<div class="col-md-4">
	@isset($event)
		<strong>Current Image</strong>
		<div class="current-image">
			@if ($event->image !== null)
				<img src="{{ $event->image->url_cache }}" alt="event-image" class="img-responsive">
			@else
				<p>No image uploaded</p>
			@endif
		</div>
	@endisset
	<div class="form-group">
		<div class="__react-root" id="FancyInput"></div>
	</div>
</div>
