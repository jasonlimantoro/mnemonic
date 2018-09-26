@extends('backend.layouts.master')

@section('content')
	@component('backend.layouts.breadcrumb', ['current' => 'Bridesmaid & Bestman'])
	@endcomponent
  @component('backend.layouts.panel', [
    'title' => 'Bridesmaid and Bestman'
	])
		@can('create', \App\Models\BridesBest::class)
			@slot('addButton') 
				@component('backend.layouts.addButton', [
					'url' => subdomainRoute('bridesmaid-bestmans.create')
				])
				@endcomponent
				
			@endslot
		@endcan
		@slot('body')
			@component('backend.layouts.query', [
				'title' => 'Name',
				'body' => 'Testimony'
			]) 
			@endcomponent
      @component('layouts.table')
        @slot('tableHeader')
          <tr>
            <th class="col title">Name</th>
            <th class="col body">Testimony</th>
            <th class="col action">Action</th>
          </tr>
        @endslot
    
        @slot('tableBody')
          @foreach($bridesBests as $b)
            @include('backend.day.bridesbests.bridesbest')
          @endforeach
        @endslot
    
      @endcomponent
    @endslot
  @endcomponent
@endsection