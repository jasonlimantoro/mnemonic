@extends('layouts.master')


@section('content')
	<div class="web-container">
		<div class="container about-us-container">
			<div class="col-md-12">
				<div class="row page-title font-theme">
					<h1 class="color-theme">About Us</h1>
				</div>
				<div class="row">
					@foreach($couple as $c)
						<div class="col-md-12 about-us-content">
							<div class="col-md-4 couple-image">
								<img src="{{ optional($c->image)->url_cache }}" alt="{{ $c->name }}" class="img-responsive"> 
							</div>
							<div class="col-md-8 couple-description">
								<div class="col-md-12 couple-name font-theme">
									<h1> {{ $c->name }} </h1>
								</div>
								
								<div class="col-md-12 couple-detail">
	
								</div>
							</div>
						</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
@endsection