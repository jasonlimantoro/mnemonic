@extends('backend.layouts.master')

@section('content')
	@component('backend.layouts.breadcrumb', ['current' => 'Vendors'])
	@endcomponent
  @component('backend.layouts.panel', [
    'title' => "Create a new vendor"
  ])
    @slot('backButton')
      @component('backend.layouts.backButton', [
        'text' => 'All Vendors',
        'url' => route('vendors.index')
      ])
      @endcomponent
    @endslot
		@slot('body')
			{{ Form::open(['route' => 'vendors.store']) }}
				@include('backend.day.vendors.form', [
					'submitButtonText' => 'Add Vendor',
				])
			{{ Form::close() }}
    @endslot
  @endcomponent
@endsection