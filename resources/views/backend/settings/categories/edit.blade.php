@extends('backend.layouts.master')

@section('content')
  <div class="row">
    <div class="col-md-12">
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
    </div>
  </div>
@endsection