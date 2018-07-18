@extends('backend.layouts.master')

@section('content')
	@component('backend.layouts.breadcrumb', ['current' => 'Vendor Categories'])
	@endcomponent
  @component('backend.layouts.panel', [
    'title' => "Create a new category"
  ])
    @slot('backButton')
      @component('backend.layouts.backButton', [
        'text' => 'All Categories',
        'url' => route('categories.index')
      ])
        
      @endcomponent
    @endslot
		@slot('body')
			{{ Form::open(['route' => 'categories.store']) }}
				@include('backend.settings.categories.form', ['submitButtonText' => 'Add Category'])
			{{ Form::close() }}
    @endslot
  @endcomponent
@endsection