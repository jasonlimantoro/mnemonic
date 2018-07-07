@extends('backend.layouts.master')

@section('content')
  <div class="row">
    <div class="col-md-12">
			@component('backend.layouts.breadcrumb', ['current' => 'Events'])
			@endcomponent
      @component('backend.layouts.panel', [
        'title' => "Event"
			])
				@can('create', App\Event::class)
					@slot('addButton')
						@component('backend.layouts.addButton', [
							'url' => route('events.create'),
							'item' => 'event'
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
                @include('backend.wedding.events.event')
              @endforeach
            @endslot
        
          @endcomponent
        @endslot
      @endcomponent
    </div>
  </div>
@endsection
