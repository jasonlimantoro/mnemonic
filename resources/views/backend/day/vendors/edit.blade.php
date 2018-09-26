@extends('backend.layouts.master')

@section('content')
	@component('backend.layouts.breadcrumb', ['current' => $vendor->name])
    <li><a href="{{ subdomainRoute('vendors.index') }}">Vendors</a></li>
	@endcomponent
  @component('backend.layouts.panel', [
    'title' => "Edit a vendor"
  ])
		@slot('body')
			{{ Form::model($vendor, ['route' => ['vendors.update', $vendor->id], 'method' => 'PATCH']) }}
				@include('backend.day.vendors.form', [
					'submitButtonText' => 'Update Vendor',
				])
			{{ Form::close() }}
    @endslot
  @endcomponent
@endsection