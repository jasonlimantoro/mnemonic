@extends('backend.layouts.master')

@section('content')
	@component('backend.layouts.breadcrumb', ['current' => 'Create'])
    <li><a href="{{ subdomainRoute('categories.index') }}">Vendor Categories</a></li>
	@endcomponent
  @component('backend.layouts.panel', [
    'title' => "Create a new category"
  ])
		@slot('body')
			{{ Form::open(['route' => ['categories.store', env('APP_SUBDOMAIN')]]) }}
				@include('backend.settings.categories.form', ['submitButtonText' => 'Add Category'])
			{{ Form::close() }}
    @endslot
  @endcomponent
@endsection