<div class="__react-root" id="FancyInput"></div>

{{-- name field --}}
<div class="form-group">
	{{ Form::label('name', 'Album Name:') }}
	{{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Enter Album Name']) }}
</div>

{{-- description field --}}
<div class="form-group">
	{{ Form::label('description', 'Description:') }}
	{{ Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'Enter Description']) }}
</div>

{{-- Submit Button --}}
<div class="form-group">
	{{ Form::submit($submitButtonText, ['class' => 'btn btn-primary']) }}
</div>
