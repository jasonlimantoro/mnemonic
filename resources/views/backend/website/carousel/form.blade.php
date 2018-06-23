@react("FancyInput")

{{-- caption field --}}
<div class="form-group">
	{{ Form::label('caption', 'Enter caption:') }}
	{{ Form::textarea('caption', null, ['class' => 'form-control show', 'placeholder' => 'Enter Caption']) }}
</div>

{{-- Submit Button --}}
<div class="form-group">
	{{ Form::submit($submitButtonText, ['class' => 'btn btn-primary']) }}
</div>
