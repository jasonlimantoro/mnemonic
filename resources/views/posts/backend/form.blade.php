<div class="col-md-8">
	{{-- title field --}}
	<div class="form-group">
		{{ Form::label('title', 'Title:') }}
		{{ Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Enter Title']) }}
	</div>

  <div data-component="Editor"
       data-prop-name="description"
       data-prop-label="Description"
       data-prop-default-value="{{ isset($post) ? $post->description : '' }}"
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
          <img src="{{ $postImage->urlCache('post') }}" alt="event" class="img-responsive">
				@else
					<p>No Image uploaded</p>
				@endisset	
			</div>
		</div>
    <div data-component="DeleteButton"
         data-prop-url="{{ route('posts.remove-image', ['page' => $page->id, 'post' => $post->id]) }}"
         data-prop-text="Remove Image"
         data-prop-has-image="{{ $post->images()->count() }}"
    >
    </div>
	@endif

	<div class="form-group">
		<div data-component="FancyInput"
         data-prop-initial-input-value="{{ isset($postImage) ? $postImage->name : '' }}"
    >
		</div>
	</div>
</div>
