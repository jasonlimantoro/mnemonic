@extends('backend.layouts.master')

@section('content')
	@component('backend.layouts.breadcrumb', ['current' => $category->name])
    <li><a href="{{ subdomainRoute('categories.index') }}">Vendor Categories</a></li>
	@endcomponent
  @component('backend.layouts.panel', [
    'title' => "Edit a category"
  ])
		@slot('body')
			{{ Form::model($category, ['route' => ['categories.update', $category->id], 'method' => 'PATCH']) }}
				@include('backend.settings.categories.form', ['submitButtonText' => 'Update Category'])
			{{ Form::close() }}
    @endslot
  @endcomponent
@endsection