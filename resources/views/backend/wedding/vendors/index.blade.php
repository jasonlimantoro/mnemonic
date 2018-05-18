@extends('layouts.submaster')

@section('content')
  <div class="row">
    <div class="col-md-12">
			@component('layouts.breadcrumb', ['current' => 'Vendors'])
			@endcomponent
      @component('layouts.panel', [
        'title' => "Vendors"
      ])
				@can('create', App\Vendor::class)
					@slot('addButton')
						@component('layouts.addButton', [
							'url' => route('vendors.create'),
							'item' => 'Vendor'
						])
						@endcomponent
					@endslot
				@endcan

				@slot('body')
					@component('layouts.query', [
						'title' => 'Name',
						'body' => 'Category'
					])
							
					@endcomponent
          @component('layouts.table')
            @slot('tableHeader')
              <tr>
                <th class="col title">Name</th>
                <th class="col body">Category</th>
                <th class="col action">Action</th>
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
