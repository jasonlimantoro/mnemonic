{{-- title field --}}
<div class="form-group">
	{{ Form::label('title', 'Title:') }}
	{{ Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Enter Title']) }}
</div>

{{-- body field --}}
<div class="form-group">
	{{ Form::label('body', 'Body:') }}
	{{ Form::textarea('body', null, ['class' => 'form-control', 'placeholder' => 'Enter Body']) }}
</div>

{{-- Submit Button --}}
<div class="form-group">
	{{ Form::submit($submitButtonText, ['class' => 'btn btn-primary']) }}
</div>
