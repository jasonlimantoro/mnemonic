@extends('layouts.submaster')

@section('content')
	@component('layouts.panel', ['title' => 'Site SEO'])
		@slot('body')
			{{ Form::open(['route' => 'seo.update', 'method' => 'PATCH']) }}
				{{-- meta_title field --}}
				<div class="form-group">
					{{ Form::label('meta_title', 'Meta Title:') }}
					{{ Form::text('meta_title', optional($seo)->meta_title, ['class' => 'form-control', 'placeholder' => 'Enter Meta Title']) }}
				</div>

				{{-- meta_description field --}}
				<div class="form-group">
					{{ Form::label('meta_description', 'Meta Description:') }}
					{{ Form::text('meta_description', optional($seo)->meta_description, ['class' => 'form-control', 'placeholder' => 'Enter Meta Description']) }}
				</div>
				
				{{-- g_script field --}}
				<div class="form-group">
					{{ Form::label('g_script', 'Google Analytics Script:') }}
					{{ Form::textarea('g_script', optional($seo)->g_script, ['class' => 'form-control', 'placeholder' => 'Enter Google Analytics Script']) }}
				</div>
				
				{{-- Submit Button --}}
				<div class="form-group">
					{{ Form::submit('Update', ['class' => 'btn btn-primary']) }}
				</div>

			{{ Form::close() }}

		@endslot
	@endcomponent	
@endsection