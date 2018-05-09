{{-- name field --}}
<div class="form-group">
	{{ Form::label('name', 'Name:') }}
	{{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Enter Name']) }}
</div>

@php
	if(Route::current()->getActionMethod() === 'create')
	{
		$val = null;
	}
	else
	{
		$val = optional($vendor->category)->id;
	}
@endphp

{{-- category field --}}
<div class="form-group">
	{{ Form::label('category', 'Category:') }}
	{{ Form::select(
		'category', 
		$categories, 
		$val,
		['class' => 'form-control', 'placeholder'=> 'Select Category']) 
	}}
</div>

{{-- Submit Button --}}
<div class="form-group">
	{{ Form::submit($submitButtonText, ['class' => 'btn btn-primary']) }}
</div>
