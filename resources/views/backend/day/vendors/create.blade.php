@extends('backend.layouts.master')

@section('content')
	@component('backend.layouts.breadcrumb', ['current' => 'Create'])
    <li><a href="{{ route('vendors.index') }}">Vendors</a></li>
	@endcomponent
  @component('backend.layouts.panel', [
    'title' => "Create a new vendor"
  ])
		@slot('body')
			{{ Form::open(['route' => 'vendors.store']) }}
				@include('backend.day.vendors.form', [
					'submitButtonText' => 'Add Vendor',
				])
			{{ Form::close() }}
    @endslot
  @endcomponent
@endsection