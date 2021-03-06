@extends('backend.layouts.master')

@section('content')
	@component('backend.layouts.breadcrumb', ['current' => 'Vendor Categories'])
	@endcomponent
  @component('backend.layouts.panel', [
    'title' => "Categories"
	])
		@can('create', \App\Models\Category::class)
			@slot('addButton')
				@component('backend.layouts.addButton', [
					'url' => route('categories.create'),
				])
				@endcomponent
			@endslot
		@endcan

		@slot('body')
			@component('backend.layouts.query', [
				'title' => 'Name',
				'body' => 'Description'
			])
					
			@endcomponent
      @component('layouts.table')
        @slot('tableHeader')
					<tr>
						<th class="col-xs-3 title">Name</th>
						<th class="col-xs-6 body">Description</th>
						<th class="col-xs-1 action">Action</th>
					</tr>
        @endslot
    
        @slot('tableBody')
          @foreach($categories as $category)
            @include('backend.settings.categories.category')
          @endforeach
        @endslot
    
      @endcomponent
    @endslot
  @endcomponent
@endsection
