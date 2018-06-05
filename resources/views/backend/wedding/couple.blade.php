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
					<div class="__react-root" id="CoupleForm"></div>

				@endslot
			@endcomponent
		</div>
	</div>
@endsection
