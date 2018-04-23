@extends('layouts.master')

@section('content')
	<div class="wedding-day-container text-center">
		{{-- Overview Section --}}
		<div class="row wedding-day-overview">
			<div class="container">
				<div class="col-xs-12">
					<div class="page-title color-theme">
						<h1>Wedding Day</h1>
		
					</div>
		
					<div class="col-xs-12">
						<h2 class="font-theme">We would like to invite you to our marriage celebration</h2>
					</div>
					
					<div class="col-xs-5">
						<div class="groom-container">
							<h3 class="font-theme groom-name">{{ $groom->name }}</h3>
							<span class="font-theme">Son of</span> <br>
							<p> {{ $groom->father }} </p>
							<p> {{ $groom->mother }} </p>
							<img src="{{ $groom->image->url_cache }}" alt="groom" class="img-responsive">
						</div>
					</div>
					<div class="col-xs-2 xs-hidden link">&</div>
		
					<div class="col-xs-5">
						<div class="bride-container">
							<h3 class="font-theme bride-name">{{ $bride->name }}</h3>
							<span class="font-theme">Daughter of</span> <br>
							<p> {{ $bride->father }} </p>
							<p> {{ $bride->mother }} </p>
							<img src="{{ $bride->image->url_cache }}" alt="groom" class="img-responsive">
						</div>
					</div>
				</div>
			</div>
		</div>
	

		{{-- Event Sections --}}
		<div class="row wedding-day-events">
			@foreach ($events as $event)
				<div class="col-xs-12 wedding-day-events-date">
					<h2> {{ $event->datetime }}	</h2>
				</div>
				<div class="container">
					<div class="col-xs-12 wedding-day-events-title">
						<h2 class="font-theme color-theme"> {{ $event->name }} </h2>
					</div>

					<div class="col-xs-12 wedding-day-events-description">
						<p class="font-theme"> {{ $event->description }} </p>
					</div>

					@if ($event->image)
						<div class="col-xs-12 wedding-day-events-image">
							<img src="{{ $event->image->url_cache }}" alt="" class="img-responsive">
						</div>
					@endif
					<div class="col-xs-12 wedding-day-events-location">
						<h3>{{ $event->location }}</h3>
					</div>
				</div>
			@endforeach		
		</div>

	</div>
@endsection