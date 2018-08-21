<div class="col-md-8">
	{{-- name field --}}
	<div class="form-group">
		{{ Form::label('name', 'Album Name:') }}
		{{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Enter Album Name']) }}
	</div>
	
	{{-- description field --}}
  <div data-component="Editor"
       data-prop-name="description"
       data-prop-label="Description"
       data-prop-default-value="{{ $album->description }}"
  >
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
			<img src="{{ $album->featuredImage()->url_cache }}" alt="featured-image" class="img-responsive featured-image">
		@else
			<p>No Featured Image</p>		
		@endif
	@endisset
	<h3>Upload Featured Image</h3>
  <div data-component="FancyInput"
       data-prop-template="gallery"
       data-prop-initial-input-value="{{ isset($featureImageName) ? $featureImageName : '' }}"
  >
  </div>
</div>
