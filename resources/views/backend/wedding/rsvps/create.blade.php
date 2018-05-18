@extends('layouts.submaster')

@section('content')
  <div class="row">
    <div class="col-md-12">
			@component('layouts.breadcrumb', ['current' => 'RSVP'])
			@endcomponent
      @component('layouts.panel', [
        'title' => "Create a new RSVP"
      ])
        @slot('backButton')
          @component('layouts.backButton', [
            'text' => 'All RSVPs',
            'url' => route('rsvps.index')
          ])
          @endcomponent
        @endslot
				@slot('body')
					{{ Form::open(['route' => 'rsvps.store']) }}
						@include('backend.wedding.rsvps.form', ['submitButtonText' => 'Add new RSVP'])
					{{ Form::close() }}
        @endslot
      @endcomponent
    </div>
  </div>
@endsection