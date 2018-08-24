@extends('backend.layouts.master')

@section('content')
  @component('backend.layouts.breadcrumb', ['current' => 'RSVP'])
  @endcomponent
  @component('backend.layouts.panel', [
    'title' => "RSVP"
	])
    @can('create', App\Models\RSVP::class)
      @slot('addButton')
        @component('backend.layouts.addButton', [
          'url' => route('rsvps.create'),
        ])
        @endcomponent
      @endslot
    @endcan

    @slot('body')
      @component('backend.layouts.query', ['title' => 'Name'])
      @endcomponent
      @component('layouts.table')
        @slot('tableHeader')
          <tr>
            <th class="col-xs-10 title">Data</th>
            <th class="col-xs-1 action">Action</th>
          </tr>
        @endslot

        @slot('tableBody')
          @foreach($rsvps as $rsvp)
            @include('backend.day.rsvps.rsvp')
          @endforeach
        @endslot

      @endcomponent
    @endslot
  @endcomponent
@endsection