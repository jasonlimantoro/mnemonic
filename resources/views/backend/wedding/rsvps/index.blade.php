@extends('backend.layouts.master')

@section('content')
  <div class="row">
    <div class="col-md-12">
			@component('backend.layouts.breadcrumb', ['current' => 'RSVP'])
			@endcomponent
      @component('backend.layouts.panel', [
        'title' => "RSVP"
			])
				@can('create', App\RSVP::class)
					@slot('addButton')
						@component('backend.layouts.addButton', [
							'url' => route('rsvps.create'),
						])
						@endcomponent
					@endslot
				@endcan

				@slot('body')
          @component('layouts.table')
            @slot('tableHeader')
              <tr>
                <th class="col-xs-10 title">Identity</th>
                <th class="col-xs-1 action">Action</th>
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

