@extends('backend.layouts.master')

@section('content')
	@component('backend.layouts.breadcrumb', ['current' => 'Create'])
    <li><a href="{{ subdomainRoute('vendors.index') }}">Vendors</a></li>
	@endcomponent
  @component('backend.layouts.panel', [
    'title' => "Create a new vendor"
  ])
		@slot('body')
			{{ Form::open(['route' => ['vendors.store', env('APP_SUBDOMAIN')] ]) }}
				@include('backend.day.vendors.form', [
					'submitButtonText' => 'Add Vendor',
				])
			{{ Form::close() }}
    @endslot
  @endcomponent
@endsection