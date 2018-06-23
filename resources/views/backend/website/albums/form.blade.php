<div class="col-md-8">
	{{-- name field --}}
	<div class="form-group">
		{{ Form::label('name', 'Album Name:') }}
		{{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Enter Album Name']) }}
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
	@isset($album)
		@if ($album->featuredImage() !== null)
			<p>Featured Image: </p>
			<img src="{{ $album->featuredImage()['url_cache'] }}" alt="featured-image" class="img-responsive featured-image">
		@else
			<p>No Featured Image</p>		
		@endif
	@endisset
	<h3>Upload Featured Image</h3>
	@react("FancyInput")
</div>
