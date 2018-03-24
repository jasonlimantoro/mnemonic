@extends('layouts.submaster')

@section('content')
	<div class="row">
		<div class="col-md-12"> 
			@component('layouts.panel', [
				'title' => "Couple Information"
			]) 
			
				@slot('body')

				<div class="__react-root" id="CoupleForm"></div>

				@endslot
			@endcomponent
		</div>
	</div>
@endsection