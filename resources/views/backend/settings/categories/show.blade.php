@extends('backend.layouts.master')

@section('content')
	@component('backend.layouts.breadcrumb', ['current' => 'Vendor Categories'])
	@endcomponent
  @component('backend.layouts.panel', [
    'title' => "Category: " . $category->name
  ])
    @slot('backButton')
      @component('backend.layouts.backButton', [
        'text' => 'All Categories',
        'url' => route('categories.index')
      ])
        
      @endcomponent
    @endslot
    @slot('body')
      <h3>Description</h3>
      <p>
        {{ $category->description }}
      </p>

    @endslot
  @endcomponent
@endsection