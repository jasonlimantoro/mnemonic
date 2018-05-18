@extends('layouts.submaster')

@section('content')
  <div class="row">
    <div class="col-md-12">
			@component('layouts.breadcrumb', ['current' => 'Vendors'])
			@endcomponent
      @component('layouts.panel', [
        'title' => "Create a new vendor"
      ])
        @slot('backButton')
          @component('layouts.backButton', [
            'text' => 'All Vendors',
            'url' => route('vendors.index')
          ])
          @endcomponent
        @endslot
				@slot('body')
					{{ Form::open(['route' => 'vendors.store']) }}
						@include('backend.wedding.vendors.form', [
							'submitButtonText' => 'Add Vendor',
						])
					{{ Form::close() }}
        @endslot
      @endcomponent
    </div>
  </div>
@endsection