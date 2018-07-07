@extends('backend.layouts.master')

@section('content')
  <div class="row">
    <div class="col-md-12">
			@component('backend.layouts.breadcrumb', ['current' => 'Vendors'])
			@endcomponent
      @component('backend.layouts.panel', [
        'title' => "Vendors"
      ])
				@can('create', App\Vendor::class)
					@slot('addButton')
						@component('backend.layouts.addButton', [
							'url' => route('vendors.create'),
							'item' => 'Vendor'
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
                @include('backend.wedding.vendors.vendor')
              @endforeach
            @endslot
        
          @endcomponent
        @endslot
      @endcomponent
    </div>
  </div>
@endsection
