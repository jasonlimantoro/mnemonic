@extends('layouts.submaster')

@section('content')
  <div class="row">
    <div class="col-md-12">
			@component('layouts.breadcrumb', ['current' => 'Vendor Categories'])
			@endcomponent
      @component('layouts.panel', [
        'title' => "Create a new category"
      ])
        @slot('backButton')
          @component('layouts.backButton', [
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
    </div>
  </div>
@endsection