@extends('layouts.submaster')

@section('content')
	<div class="row">
		<div class="col-md-12"> 
			@component('layouts.breadcrumb', ['current' => 'Couple'])
			@endcomponent
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

@section('scripts')
<script>
	let canUpdate = {{ auth()->user()->can('update', 'App\Couple') == 1 ? 1 : 0 }}
</script>
@endsection