@extends('layouts.submaster')

@section('content')
  <div class="row">
    <div class="col-md-12">
			@component('layouts.breadcrumb', ['current' => 'Bridesmaid & Bestman'])
			@endcomponent
      @component('layouts.panel', [
        'title' => 'Edit Bridesmaid and Bestman'
      ])
        @slot('backButton')
          @component('layouts.backButton', [
            'text' => 'All Bridesmaid and Bestmen',
            'url' => route('bridesmaid-bestmans.index')
          ])
          @endcomponent
        @endslot
				@slot('body')
					{{ Form::open(['route' => 'bridesmaid-bestmans.store', 'enctype' => 'multipart/form-data']) }}
						@include('backend.wedding.bridesbests.form', [
							'submitButtonText' => 'Publish', 
						])
					{{ Form::close() }}

        @endslot
      @endcomponent
    </div>
  </div>
@endsection