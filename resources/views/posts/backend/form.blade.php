{{-- title field --}}
<div class="form-group">
	{{ Form::label('title', 'Title:') }}
	{{ Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Enter Title']) }}
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
