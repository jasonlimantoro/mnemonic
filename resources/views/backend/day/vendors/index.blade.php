@extends('backend.layouts.master')

@section('content')
	@component('backend.layouts.breadcrumb', ['current' => 'Vendors'])
	@endcomponent
  @component('backend.layouts.panel', [
    'title' => "Vendors"
  ])
		@can('create', App\Models\Vendor::class)
			@slot('addButton')
				@component('backend.layouts.addButton', [
					'url' => subdomainRoute('vendors.create'),
				])
				@endcomponent
			@endslot
		@endcan

		@slot('body')
			@component('backend.layouts.query', [
				'title' => 'Name',
				'body' => 'Category'
			])
					
			@endcomponent
      @component('layouts.table')
        @slot('tableHeader')
          <tr>
            <th class="col-xs-3 title">Name</th>
            <th class="col-xs-6 body">Category</th>
            <th class="col-xs-1 action">Action</th>
          </tr>
        @endslot
    
        @slot('tableBody')
          @foreach($vendors as $vendor)
            @include('backend.day.vendors.vendor')
          @endforeach
        @endslot
    
      @endcomponent
    @endslot
  @endcomponent
@endsection
