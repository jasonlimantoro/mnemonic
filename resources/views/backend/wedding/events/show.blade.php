@extends('backend.layouts.master')

@section('content')
  <div class="row">
    <div class="col-md-12">
			@component('backend.layouts.breadcrumb', ['current' => 'Events'])
			@endcomponent
      @component('backend.layouts.panel')
        @slot('backButton')
          @component('backend.layouts.backButton', [
            'text' => 'All events',
            'url' => route('events.index')
          ])
            
          @endcomponent
        @endslot
        @slot('title')
          Event: {{ $event->name }}
        @endslot

        @slot('body')
          <p>
            Description: <strong>{{ $event->description }}</strong> 
          </p>
          <p>
            Location: <strong>{{ $event->location }}</strong> 
          </p>
          <p>
            Datetime: <strong>{{ Carbon\Carbon::parse($event->datetime)->toDayDateTimeString() }}</strong> 
          </p>
        @endslot
      @endcomponent
    </div>
  </div>
@endsection