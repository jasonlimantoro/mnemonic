@extends('layouts.submaster')

@section('content')
  <div class="row">
    <div class="col-md-12">
      @component('layouts.panel', [
        'title' => "Create a new vendor"
      ])
        @slot('backButton')
          @component('layouts.backButton', [
            'text' => 'Show all vendors',
            'url' => route('vendors.index')
          ])
          @endcomponent
        @endslot
				@slot('body')
					{{ Form::open(['route' => 'vendors.store']) }}
						@include('backend.wedding.vendors.form', [
							'submitButtonText' => 'Add Vendor',
							'displayCurrentCategories' => false
						])
					{{ Form::close() }}
        @endslot
      @endcomponent
    </div>
  </div>
@endsection