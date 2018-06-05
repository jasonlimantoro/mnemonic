@extends('backend.layouts.master')

@section('content')
  <div class="row">
    <div class="col-md-12">
			@component('backend.layouts.breadcrumb', ['current' => 'Vendors'])
			@endcomponent
      @component('backend.layouts.panel', [
        'title' => "Vendor: " . $vendor->name
      ])
        @slot('backButton')
          @component('backend.layouts.backButton', [
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