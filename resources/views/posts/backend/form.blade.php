<div class="col-md-8">
	{{-- title field --}}
	<div class="form-group">
		{{ Form::label('title', 'Title:') }}
		{{ Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Enter Title']) }}
	</div>
	
	@react("InitializeEditor")
	{{-- description field --}}
	<div class="form-group">
		{{ Form::label('description', 'Description:') }}
		{{ Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'Enter Description']) }}
	</div>

	{{-- Submit Button --}}
	<div class="form-group">
		{{ Form::submit($submitButtonText, ['class' => 'btn btn-primary']) }}
	</div>
</div>

<div class="col-md-4">
	@if ($displayCurrentImage)
		<div class="form-group">
			<p><strong>Current Image</strong></p>
			<div class="current-image">
				@isset ($postImage)
					<img src="{{ $postImage }}" alt="event" class="img-responsive">
				@else
					<p>No Image uploaded</p>
				@endisset	
			</div>
		</div>
	@endif

	<div class="form-group">
		@react("FancyInput")
	</div>
</div>
