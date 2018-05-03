{{ Form::open(['url' => url()->current(), 'class'=>'form-inline', 'method' => 'get']) }} 

	{{-- search field --}}
	<div class="form-group">
		{{ Form::label('search', 'Search:') }}
		{{ Form::text('search', null, ['class' => 'form-control', 'placeholder' => 'Search here...']) }}
	</div>

	{{-- order field --}}
	<div class="form-group">
		{{ Form::label('order', 'Order By:') }}
		{{ Form::select('order', ['title' => 'Title', 'body' => 'Body'], null, ['class' => 'form-control']) }}
	</div>

	{{-- method field --}}
	<div class="form-group">
		{{ Form::label('method', 'Method:') }}
		{{ Form::select('method', ['asc' => 'Ascending', 'desc' => 'Descending'], null, ['class' => 'form-control']) }}
	</div>

	
	{{-- Submit Button --}}
	<div class="form-group">
		{{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}
	</div>
	
	{{-- reset field --}}
	<div class="form-group">
		<a href="{{ url()->current() }}" class="btn btn-default">Clear</a>
	</div>

{{ Form::close() }}