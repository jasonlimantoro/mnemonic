@extends('backend.layouts.master')

@section('content')
	@component('backend.layouts.breadcrumb', ['current' => 'Site Info'])
	@endcomponent
	@component('backend.layouts.panel', ['title' => 'Site Social Media'])
		@slot('body')
			{{ Form::open(['route' => 'sitesocial.update', 'method' => 'PATCH']) }}
				{{-- google_plus field --}}
				<div class="form-group">
					{{ Form::label('google_plus', 'Google Plus:') }}
					{{ Form::text('google_plus', optional($social)->google_plus, ['class' => 'form-control', 'placeholder' => 'Enter Google Plus']) }}
				</div>

				{{-- facebook field --}}
				<div class="form-group">
					{{ Form::label('facebook', 'Facebook:') }}
					{{ Form::text('facebook', optional($social)->facebook, ['class' => 'form-control', 'placeholder' => 'Enter Facebook']) }}
				</div>
				
				{{-- instagram field --}}
				<div class="form-group">
					{{ Form::label('instagram', 'Instagram:') }}
					{{ Form::text('instagram', optional($social)->instagram, ['class' => 'form-control', 'placeholder' => 'Enter Instagram']) }}
				</div>

				{{-- youtube field --}}
				<div class="form-group">
					{{ Form::label('youtube', 'Youtube:') }}
					{{ Form::text('youtube', optional($social)->youtube, ['class' => 'form-control', 'placeholder' => 'Enter Youtube']) }}
				</div>
				
				{{-- Submit Button --}}
				<div class="form-group">
					@can('update-site-social')
						{{ Form::submit('Update', ['class' => 'btn btn-primary']) }}
					@else
						{!! Form::unauthorizedButton() !!}
					@endcan
				</div>

			{{ Form::close() }}

		@endslot
	@endcomponent	
@endsection