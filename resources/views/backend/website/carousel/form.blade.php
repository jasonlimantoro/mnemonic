<div data-component="FancyInput"
     data-prop-template="gallery"
     data-prop-initial-input-value="{{ isset($image) ? $image->name : '' }}"
></div>

{{-- caption field --}}
<div class="form-group">
	{{ Form::label('caption', 'Enter caption:') }}
	{{ Form::textarea('caption', null, ['class' => 'form-control show', 'placeholder' => 'Enter Caption']) }}
</div>

{{-- Submit Button --}}
<div class="form-group">
	{{ Form::submit($submitButtonText, ['class' => 'btn btn-primary']) }}
</div>
