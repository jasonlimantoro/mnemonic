@extends('backend.layouts.master')

@section('content')
	@component('backend.layouts.breadcrumb', ['current' => 'RSVP'])
	@endcomponent
  @component('backend.layouts.panel', [
    'title' => "RSVP Data"
  ])
    @slot('backButton')
      @component('backend.layouts.backButton', [
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
@endsection