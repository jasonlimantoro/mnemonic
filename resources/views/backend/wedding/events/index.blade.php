@extends('layouts.submaster')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @component('layouts.panel', ['backButton' => '', 'addButton' => ''])
                @slot('title')
                    Event
				@endslot

                @slot('addButton')
                    @component('layouts.addButton', [
                        'url' => route('events.create'),
                        'item' => 'event'
                    ])
                    @endcomponent
                @endslot

                @slot('body')
					@component('layouts.table')
						@slot('tableHeader')
							<tr>
								<th class="col title">Title</th>
								<th class="col body">Body</th>
								<th class="col action">Action</th>
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
