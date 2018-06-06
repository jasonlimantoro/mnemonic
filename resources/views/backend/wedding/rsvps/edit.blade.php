@extends('backend.layouts.master')

@section('content')
  <div class="row">
    <div class="col-md-12">
			@component('backend.layouts.breadcrumb', ['current' => 'RSVP'])
			@endcomponent
      @component('backend.layouts.panel', [
        'title' => "Edit a RSVP"
      ])
        @slot('backButton')
          @component('backend.layouts.backButton', [
            'text' => 'All RSVPs',
            'url' => route('rsvps.index')
          ])
          @endcomponent
        @endslot
				@slot('body')
					{{ Form::model($rsvp, ['route' => ['rsvps.update', $rsvp->id], 'method' => 'PATCH']) }}
						@include('backend.wedding.rsvps.form', ['submitButtonText' => 'Update RSVP'])
					{{ Form::close() }}
        @endslot
      @endcomponent
    </div>
  </div>
@endsection