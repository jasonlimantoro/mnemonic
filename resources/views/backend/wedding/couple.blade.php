@extends('backend.layouts.master')

@section('content')
	<div class="row">
		<div class="col-md-12"> 
			@component('backend.layouts.breadcrumb', ['current' => 'Couple'])
			@endcomponent
			@component('backend.layouts.panel', [
				'title' => "Couple Information"
			]) 
			
				@slot('body')

					@include('jsvar')
					@react("CoupleForm")

				@endslot
			@endcomponent
		</div>
	</div>
@endsection
