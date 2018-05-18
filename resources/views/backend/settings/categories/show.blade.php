@extends('layouts.submaster')

@section('content')
  <div class="row">
    <div class="col-md-12">
			@component('layouts.breadcrumb', ['current' => 'Vendor Categories'])
			@endcomponent
      @component('layouts.panel', [
        'title' => "Category: " . $category->name
      ])
        @slot('backButton')
          @component('layouts.backButton', [
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
    </div>
  </div>
@endsection