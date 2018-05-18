@extends('layouts.submaster')

@section('content')
  <div class="row">
    <div class="col-md-12">
			@component('layouts.breadcrumb', ['current' => 'Vendor Categories'])
			@endcomponent
      @component('layouts.panel', [
        'title' => "Categories"
			])
				@can('create', App\Category::class)
					@slot('addButton')
						@component('layouts.addButton', [
							'url' => route('categories.create'),
							'item' => 'Categories'
						])
						@endcomponent
					@endslot
				@endcan

				@slot('body')
					@component('layouts.query', [
						'title' => 'Name',
						'body' => 'Description'
					])
							
					@endcomponent
          @component('layouts.table')
            @slot('tableHeader')
							<tr>
								<th class="col title">Name</th>
								<th class="col body">Description</th>
								<th class="col action">Action</th>
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
    </div>
  </div>
@endsection
