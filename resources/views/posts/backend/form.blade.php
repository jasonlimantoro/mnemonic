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

	@if (auth()->user()->can('update', $post))
		{{ Form::submit($submitButtonText, ['class' => 'btn btn-primary']) }}
	@else
		<button disabled class="btn btn-default">Unauthorized</button>
	@endif
</div>
