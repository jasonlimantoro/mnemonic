@extends('backend.layouts.master')

@section('content')
  <div class="row">
    <div class="col-md-12">
			@component('backend.layouts.breadcrumb', ['current' => 'Vendors'])
			@endcomponent
      @component('backend.layouts.panel', [
        'title' => "Edit a vendor"
      ])
        @slot('backButton')
          @component('backend.layouts.backButton', [
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