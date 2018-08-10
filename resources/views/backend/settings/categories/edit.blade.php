@extends('backend.layouts.master')

@section('content')
	@component('backend.layouts.breadcrumb', ['current' => 'Vendor Categories'])
	@endcomponent
  @component('backend.layouts.panel', [
    'title' => "Edit a category"
  ])
    @slot('backButton')
      @component('backend.layouts.backButton', [
        'text' => 'All categories',
        'url' => route('categories.index')
      ])
        
      @endcomponent
    @endslot
		@slot('body')
			{{ Form::model($category, ['route' => ['categories.update', $category->id], 'method' => 'PATCH']) }}
				@include('backend.settings.categories.form', ['submitButtonText' => 'Update Category'])
			{{ Form::close() }}
    @endslot
  @endcomponent
@endsection