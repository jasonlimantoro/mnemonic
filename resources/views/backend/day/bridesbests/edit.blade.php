@extends('backend.layouts.master')

@section('content')
  <div class="row">
    <div class="col-md-12">
			@component('backend.layouts.breadcrumb', ['current' => 'Bridesmaid & Bestman'])
			@endcomponent
      @component('backend.layouts.panel', [
        'title' => 'Edit Bridesmaid and Bestman'
      ])
        @slot('backButton')
          @component('backend.layouts.backButton', [
            'text' => 'All Bridesmaid and Bestmen',
            'url' => route('bridesmaid-bestmans.index')
          ])
          @endcomponent
        @endslot
				@slot('body')
					{{ Form::model($bridesBest, [
						'route' => ['bridesmaid-bestmans.update', $bridesBest->id], 
						'method' => 'PATCH', 
						'enctype' => 'multipart/form-data'
						]) 
					}}
						@include('backend.day.bridesbests.form', [
							'submitButtonText' => 'Update', 
						])
					{{ Form::close() }}
        @endslot
      @endcomponent
    </div>
  </div>
@endsection