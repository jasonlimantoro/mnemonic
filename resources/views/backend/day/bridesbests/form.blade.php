<div class="col-md-8">
	{{-- name field --}}
	<div class="form-group">
		{{ Form::label('name', 'Name:') }}
		{{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Enter name']) }}
	</div>

	{{-- testimony field --}}
  <div data-component="Editor"
       data-prop-name="testimony"
       data-prop-label="Testimony"
       data-prop-default-value="{{ isset($bridesBest) ? $bridesBest->testimony : '' }}"
  >
  </div>

	{{-- ig_account field --}}
	<div class="form-group">
		{{ Form::label('ig_account', 'Instagram Account:') }}
		<div class="input-group">
			<div class="input-group-addon">@</div>
			{{ Form::text('ig_account', null, ['class' => 'form-control', 'placeholder' => 'Enter Instagram Account']) }}
		</div>
	</div>

	{{-- gender field --}}
	<div class="form-group">
		{!! Form::selectGender('gender', 'Bridesmaid', 'Bestmen') !!}
	</div>

	<div class="form-group">
		{{ Form::submit($submitButtonText, ['class' => 'btn btn-primary']) }}
	</div>

</div>
<div class="col-md-4">
	@isset($bridesBest)
		<div class="form-group">
			<p><strong>Current Image</strong></p>
			<div class="current-image">
				@isset ($bridesBestImage)
					<img src="{{ $bridesBestImage }}" alt="event" class="img-responsive">
				@else
					<p>No Image uploaded</p>
				@endisset	
			</div>
		</div>
	@endisset
  <div data-component="FancyInput"
       data-prop-template="bridesbest"
       data-prop-initial-input-value="{{ isset($bridesBestImageName) ? $bridesBestImageName : '' }}"
  >
  </div>
</div>