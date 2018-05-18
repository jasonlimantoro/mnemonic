@extends('layouts.submaster')

@section('content')
  <div class="row">
    <div class="col-md-12">
			@component('layouts.breadcrumb', ['current' => 'RSVP'])
			@endcomponent
      @component('layouts.panel', [
        'title' => "RSVP"
			])
				@can('create', App\RSVP::class)
					@slot('addButton')
						@component('layouts.addButton', [
							'url' => route('rsvps.create'),
							'item' => 'RSVP'
						])
						@endcomponent
					@endslot
				@endcan

				@slot('body')
          @component('layouts.table')
            @slot('tableHeader')
              <tr>
                <th class="col title">Identity</th>
                <th class="col body">Information</th>
                <th class="col action">Action</th>
              </tr>
            @endslot
        
            @slot('tableBody')
              @foreach($rsvps as $rsvp)
                @include('backend.wedding.rsvps.rsvp')
              @endforeach
            @endslot
        
          @endcomponent
        @endslot
      @endcomponent
    </div>
  </div>
@endsection

