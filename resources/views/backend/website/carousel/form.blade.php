<div class="__react-root" id="FancyInput"></div>

{{-- caption field --}}
<div class="form-group">
	{{ Form::label('caption', 'Enter caption:') }}
	{{ Form::textarea('caption', null, ['class' => 'form-control', 'placeholder' => 'Enter Caption']) }}
</div>

{{-- Submit Button --}}
<div class="form-group">
	{{ Form::submit($submitButtonText, ['class' => 'btn btn-primary']) }}
</div>
