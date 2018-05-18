@extends('layouts.submaster')

@section('content')
  <div class="row">
    <div class="col-md-12">
			@component('layouts.breadcrumb', ['current' => 'RSVP'])
			@endcomponent
      @component('layouts.panel', [
        'title' => "RSVP Data"
      ])
        @slot('backButton')
          @component('layouts.backButton', [
            'text' => 'All RSVPs',
            'url' => route('rsvps.index')
          ])
            
          @endcomponent
        @endslot
        @slot('body')
          Name : {{ $rsvp->name }} <br>
          Email : {{ $rsvp->email }} <br>
          Phone : {{ $rsvp->phone }} <br>
          Table : {{ $rsvp->table_name }} <br>
          Total Invitation(s) : {{ $rsvp->total_invitation }} <br>
        @endslot
      @endcomponent
    </div>
  </div>
@endsection