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
					{{ Form::text('google_plus', isset($social->google_plus) ? $social->google_plus : null, ['class' => 'form-control', 'placeholder' => 'Enter Google Plus']) }}
				</div>

				{{-- facebook field --}}
				<div class="form-group">
					{{ Form::label('facebook', 'Facebook:') }}
					{{ Form::text('facebook', isset($social->facebook) ? $social->facebook : null, ['class' => 'form-control', 'placeholder' => 'Enter Facebook']) }}
				</div>
				
				{{-- instagram field --}}
				<div class="form-group">
					{{ Form::label('instagram', 'Instagram:') }}
					{{ Form::text('instagram', isset($social->instagram) ? $social->instagram : null, ['class' => 'form-control', 'placeholder' => 'Enter Instagram']) }}
				</div>

				{{-- youtube field --}}
				<div class="form-group">
					{{ Form::label('youtube', 'Youtube:') }}
					{{ Form::text('youtube', isset($social->youtube) ? $social->youtube : null, ['class' => 'form-control', 'placeholder' => 'Enter Youtube']) }}
				</div>
      
      {{-- telegram field --}}
      <div class="form-group">
        {{ Form::label('telegram', 'Telegram:') }}
        {{ Form::text('telegram', isset($social->telegram) ? $social->telegram : null, ['class' => 'form-control', 'placeholder' => 'Enter Telegram']) }}
      </div>
      
      {{-- line field --}}
      <div class="form-group">
        {{ Form::label('line', 'Line:') }}
        {{ Form::text('line', isset($social->line) ? $social->line : null, ['class' => 'form-control', 'placeholder' => 'Enter Line']) }}
      </div>
				
				{{-- Submit Button --}}
				<div class="form-group">
					@can('update-site-social')
						{{ Form::submit('Update', ['class' => 'btn btn-primary']) }}
					@else
						{{ Form::unauthorizedButton() }}
					@endcan
				</div>

			{{ Form::close() }}

		@endslot
	@endcomponent	
@endsection