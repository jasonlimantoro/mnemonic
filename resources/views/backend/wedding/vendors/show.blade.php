@extends('layouts.submaster')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @component('layouts.panel', [
				'title' => "Vendor: " . $vendor->name
			])
                @slot('backButton')
                    @component('layouts.backButton', [
                        'text' => 'Show all vendors',
                        'url' => route('vendors.index')
                    ])
                        
                    @endcomponent
                @endslot
				@slot('body')
					<h3>Categories:</h3>
					<ul class="list-unstyled">
						@forelse ($vendor->categories as $category)
							<li>{{ $category->name }}</li>
						@empty
							<p><i>None</i></p>
						@endforelse
					</ul>
                @endslot
            @endcomponent
        </div>
    </div>
@endsection