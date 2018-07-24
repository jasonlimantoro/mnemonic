@extends('layouts.master', ['pageTitle' => 'RSVP'])

@section('content')
  <div class="container online-rsvp-container text-center">
    <div class="col-md-12">
      <div class="row page-title">
        <h1 class="color-theme font-theme">Online RSVP</h1>
      </div>

      <div class="row row-center rsvp-form">
        <h3 class="form-title">
          Please enter your unique RSVP code below:
        </h3>


        {{ Form::open(['route' => 'rsvps.confirmFromFront', 'method' => 'POST']) }}
        <div class="col-sm-6 col-xs-12 col-center">
          @include('layouts.error')
          {{-- rsvp field --}}
          <div class="form-group">
            {{ Form::label('rsvp', 'RSVP Code:') }}
            {{ Form::text('rsvp', null, ['class' => 'form-control', 'placeholder' => 'e.g. 0001, 0011']) }}
          </div>

          <div class="form-group">
            {!! Recaptcha::render() !!}
          </div>

          {{-- Submit Button --}}
          <div class="form-group">
            {{ Form::submit('Submit', ['class' => 'btn btn-primary box-theme' , isset($event) ? '' : 'disabled' ]) }}
          </div>
        </div>
        {{ Form::close() }}

      </div>

      <div class="row rsvp-timer">

        <div class="rsvp-timer-header">
          @isset($event)
            <h3>
              My birthday party {{ $isFuture ? 'will be held in ' : 'has been held since ' }}{{ $event->present()->prettyDatetime }}
            </h3>
          @else
            <h3>No birthday event found</h3>
          @endisset
        </div>

        @isset($eventDate)
          <div data-component="RSVPTimer"
               data-prop-wedding-date="{{ $eventDate }}"
          >
          </div>
        @endisset

        @if(session('rsvp'))
          <div data-component="RSVPModal"
               data-prop-rsvp="{{ session('rsvp') }}"
          >
          </div>
        @endif
        
      </div>
    </div>
  </div>
@endsection
