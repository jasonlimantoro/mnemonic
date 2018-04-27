{{-- name field --}}
<div class="form-group">
	{{ Form::label('name', 'Name:') }}
	{{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Enter Name']) }}
</div>

@if ($displayCurrentCategories)
	<div class="form-group">
		<label class="control-label">Current Categories ({{ count($vcategories) }})</label>
		<ul class="list-unstyled">
			@forelse ($vcategories as $vcategory)
				<li>{{ $vcategory }}</li>
			@empty
				<p><i>none</i></p>									
			@endforelse
		</ul>
	</div>
@endif

<div class="form-group">
	<p><strong>Select Categories</strong></p>
	@foreach ($categories as $category)
		<label class="checkbox-inline">
			{{ Form::checkbox('category[]', $category->id, $displayCurrentCategories && in_array($category->name, $vcategories))}}
			{{ $category->name }}
		</label>
	@endforeach							
</div>

{{-- Submit Button --}}
<div class="form-group">
	{{ Form::submit($submitButtonText, ['class' => 'btn btn-primary']) }}
</div>
