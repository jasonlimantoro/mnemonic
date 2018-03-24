@extends('layouts.submaster')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @component('layouts.panel', ['addButton' => ''])
                @slot('backButton')
                    @component('layouts.backButton', [
                        'text' => 'Show all events',
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