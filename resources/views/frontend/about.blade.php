@extends('layouts.master')


@section('content')
	<div class="container about-us-main">
		<div class="col-md-12">
			<div class="row page-title">
				<h1>About Us</h1>
			</div>
			<div class="row about-us-container">
				@foreach($couple as $c)
					<div class="col-md-12 about-us-content">
						<div class="col-md-4 couple-image">
							<img src="{{ $c->images->first()->url_cache }}" alt="{{ $c->name }}" class="img-responsive"> 
						</div>
						<div class="col-md-8 couple-description">
							<div class="col-md-12 couple-name">
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
@endsection