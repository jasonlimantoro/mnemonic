@extends('layouts.submaster')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @component('layouts.panel', [
				'title' => "Vendors"
			])
                @slot('addButton')
                    @component('layouts.addButton', [
                        'url' => route('vendors.create'),
                        'item' => 'Vendor'
                    ])
                    @endcomponent
                @endslot

                @slot('body')
					@component('layouts.table')
						@slot('tableHeader')
							<tr>
								<th class="col title">Title</th>
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
