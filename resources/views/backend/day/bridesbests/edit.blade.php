@extends('backend.layouts.master')

@section('content')
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
				])
			}}
				@include('backend.day.bridesbests.form', [
					'submitButtonText' => 'Update', 
				])
			{{ Form::close() }}
    @endslot
  @endcomponent
@endsection