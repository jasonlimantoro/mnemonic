@extends('backend.layouts.master')

@section('content')
	@component('backend.layouts.breadcrumb', ['current' => 'Bridesmaid & Bestman'])
	@endcomponent
  @component('backend.layouts.panel', [
    'title' => 'Edit Bridesmaid and Bestman'
  ])
    @slot('backButton')
      @component('backend.layouts.backButton', [
        'text' => 'All Bridesmaid and Bestmen',
        'url' => route('bridesmaid-bestmans.index')
      ])
      @endcomponent
    @endslot
		@slot('body')
			{{ Form::open(['route' => 'bridesmaid-bestmans.store', 'enctype' => 'multipart/form-data']) }}
				@include('backend.day.bridesbests.form', [
					'submitButtonText' => 'Publish', 
				])
			{{ Form::close() }}

    @endslot
  @endcomponent
@endsection