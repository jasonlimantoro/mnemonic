@extends('layouts.master')

@section('content')
	@include('jsvar')
	<div class="container rsvp-container text-center">
		<div class="col-md-12">
			<div class="row page-title">
				<h1 class="color-theme font-theme">Online RSVP</h1>
			</div>

			<div class="row rsvp-form">
				<h3 class="form-title"> 
						Please enter your unique RSVP code below:
				</h3>
				@isset($rsvp)
					<div class="rsvp-success-modal">
						<div class="__react-root" id="RSVPModal"></div>
					</div>
				@endisset
				
				{{ Form::open(['route' => 'rsvps.confirmFromFront', 'method' => 'POST']) }}
				<div class="col-md-4 col-md-offset-4 col-sm-10 col-xs-12">
						@include('layouts.error')
						{{-- rsvp field --}}
						<div class="form-group">
							{{ Form::label('rsvp', 'RSVP Code:') }}
							{{ Form::text('rsvp', null, ['class' => 'form-control', 'placeholder' => 'e.g. 0001, 0011']) }}
						</div>	

						{!! Recaptcha::render() !!}
						{{-- Submit Button --}}
						<div class="form-group">
							{{ Form::submit('Submit', ['class' => 'btn btn-primary box-theme' , isset($wedding) ? '' : 'disabled' ]) }}
						</div>
					</div>
				{{ Form::close() }}

			</div>

			<div class="row rsvp-timer">

				<div class="rsvp-timer-header">
					@isset($wedding)
						<h3>We {{ $isFuture ? 'will be married in ' : 'have been married since ' }}{{ $wedding->datetime }}</h3>
					@else
						<h3>No wedding event found</h3>
					@endisset
				</div>

				@isset($weddingDate)
					<div class="__react-root" id="RSVPTimer"></div>
				@endisset
			</div>
		</div>
	</div>
@endsection