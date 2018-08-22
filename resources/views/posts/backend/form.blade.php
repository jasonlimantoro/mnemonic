<div class="col-md-8">
	{{-- title field --}}
	<div class="form-group">
		{{ Form::label('title', 'Title:') }}
		{{ Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Enter Title']) }}
	</div>

  <div data-component="Editor"
       data-prop-name="description"
       data-prop-label="Description"
       data-prop-default-value="{!! $post->description !!}"
  >
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
		<div data-component="FancyInput"
         data-prop-template="{{ $template ?? 'post' }}"
         data-prop-initial-input-value="{{ isset($post) ? optional($post->image)->file_name : '' }}"
    >
		</div>
	</div>
</div>
