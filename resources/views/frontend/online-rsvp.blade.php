@extends('layouts.master')

@section('content')
	<div class="web-container">
		<div class="container rsvp-container text-center">
			<div class="col-md-12">
				<div class="row page-title font-theme">
					<h1 class="color-theme">Online RSVP</h1>
				</div>

				<div class="row rsvp-form">
					<h3 class="form-title"> 
							Please enter your unique RSVP code below:
					</h3>
					{{ Form::open() }}
						<div class="col-md-4 col-md-offset-4 col-sm-10 col-xs-12">
							{{-- rsvp field --}}
							<div class="form-group">
								{{ Form::label('rsvp', 'RSVP Code:') }}
								{{ Form::text('rsvp', null, ['class' => 'form-control', 'placeholder' => 'e.g. 0001, 0011']) }}
							</div>	
	
							{{-- Submit Button --}}
							<div class="form-group">
								{{ Form::submit('Submit', ['class' => 'btn btn-primary box-theme']) }}
							</div>
						</div>
					{{ Form::close() }}

				</div>

				<div class="row rsvp-timer">

					<div class="rsvp-timer-header">
						@if (!is_null($wedding))
							<h3>We {{ $isFuture ? 'will be married in ' : 'have been married since ' }}{{ $wedding->datetime }}</h3>
						@else
							<h3>No wedding event found</h3>
						@endif
					</div>

					@include('jsvar')
					<div class="__react-root" id="RSVPTimer"></div>
				</div>
			</div>
		</div>
	
	</div>
@endsection