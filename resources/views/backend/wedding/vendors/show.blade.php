@extends('layouts.submaster')

@section('content')
  <div class="row">
    <div class="col-md-12">
			@component('layouts.breadcrumb', ['current' => 'Vendors'])
			@endcomponent
      @component('layouts.panel', [
        'title' => "Vendor: " . $vendor->name
      ])
        @slot('backButton')
          @component('layouts.backButton', [
            'text' => 'All vendors',
            'url' => route('vendors.index')
          ])
            
          @endcomponent
        @endslot
        @slot('body')
					<h3>Categories:</h3>
					<span class="label label-default">
						{{ optional($vendor->category)->name ?? "None" }}
					</span>
        @endslot
      @endcomponent
    </div>
  </div>
@endsection