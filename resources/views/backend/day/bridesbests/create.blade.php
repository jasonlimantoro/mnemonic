@extends('backend.layouts.master')

@section('content')
	@component('backend.layouts.breadcrumb', ['current' => 'Create'])
    <li><a href="{{ subdomainRoute('bridesmaid-bestmans.index') }}">Bridesmaid & Bestmen</a></li>
	@endcomponent
  @component('backend.layouts.panel', [
    'title' => 'Edit Bridesmaid and Bestman'
  ])
		@slot('body')
			{{ Form::open([
        'route' => ['bridesmaid-bestmans.store', env('APP_SUBDOMAIN')],
        'enctype' => 'multipart/form-data'])
		  }}
				@include('backend.day.bridesbests.form', [
					'submitButtonText' => 'Publish', 
				])
			{{ Form::close() }}

    @endslot
  @endcomponent
@endsection