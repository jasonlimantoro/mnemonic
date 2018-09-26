@extends('backend.layouts.master')

@section('content')
	@component('backend.layouts.breadcrumb', ['current' => 'Events'])
	@endcomponent
  @component('backend.layouts.panel', [
    'title' => "Event"
	])
		@can('create', \App\Models\Event::class)
			@slot('addButton')
				@component('backend.layouts.addButton', [
					'url' => subdomainRoute('events.create'),
				])
				@endcomponent
			@endslot
		@endcan

		@slot('body')
			@component('backend.layouts.query', [
				'title' => 'Name',
				'body' => 'Description'
			]) 
			@endcomponent
      @component('layouts.table')
        @slot('tableHeader')
          <tr>
            <th class="col-xs-3 title">Name</th>
            <th class="col-xs-6 body">Description</th>
            <th class="col-xs-1 action">Action</th>
          </tr>
        @endslot
    
        @slot('tableBody')
          @foreach($events as $event)
            @include('backend.day.events.event')
          @endforeach
        @endslot
    
      @endcomponent
    @endslot
  @endcomponent
@endsection
