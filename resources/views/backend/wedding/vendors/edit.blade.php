@extends('layouts.submaster')

@section('content')
  <div class="row">
    <div class="col-md-12">
			@component('layouts.breadcrumb', ['current' => 'Vendors'])
			@endcomponent
      @component('layouts.panel', [
        'title' => "Edit a vendor"
      ])
        @slot('backButton')
          @component('layouts.backButton', [
            'text' => 'All Vendors',
            'url' => route('vendors.index')
          ])
            
          @endcomponent
        @endslot
				@slot('body')
					{{ Form::model($vendor, ['route' => ['vendors.update', $vendor->id], 'method' => 'PATCH']) }}
						@include('backend.wedding.vendors.form', [
							'submitButtonText' => 'Update Vendor',
						])
					{{ Form::close() }}
        @endslot
      @endcomponent
    </div>
  </div>
@endsection