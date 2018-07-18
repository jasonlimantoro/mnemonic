@extends('backend.layouts.master')

@section('content')
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
				@include('backend.day.vendors.form', [
					'submitButtonText' => 'Update Vendor',
				])
			{{ Form::close() }}
    @endslot
  @endcomponent
@endsection