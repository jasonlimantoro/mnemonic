@extends('backend.layouts.master')

@section('content')
	@component('backend.layouts.breadcrumb', ['current' => $bridesBest->name ])
    <li><a href="{{ subdomainRoute('bridesmaid-bestmans.index') }}">Bridesmaid & Bestmen</a></li>
	@endcomponent
  @component('backend.layouts.panel', [
    'title' => 'Edit Bridesmaid and Bestman'
  ])
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