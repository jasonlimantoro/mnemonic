@extends('layouts.master')

@section('content')
	<div class="container-fluid text-center">
		{{-- Overview Section --}}
		<div class="row wedding-day-overview">
			<div class="col-xs-12">
				<div class="page-title">
					<h1 class="color-theme font-theme">Wedding Day</h1>
				</div>
				@isset($embed)
					<div class="embed-responsive embed-responsive-16by9">
						<iframe class="embed-responsive-item" src="http://www.youtube.com/embed/{{ $embed->id }}"></iframe>
					</div>
				@endisset
				<div class="col-xs-12">
					<h2>We would like to invite you to our marriage celebration</h2>
				</div>
				
				<div class="col-sm-5 col-xs-12">
					<div class="vip-container">
						<h3 class="font-theme vip-name">{{ $groom->name }}</h3>
						<span class="font-theme">Son of</span> <br>
						<p>{{ $groom->father }} &</p>
						<p>{{ $groom->mother }}</p>
						<img src="{{ $groom->image->url_cache }}" alt="vip" class="img-responsive inline-block">
					</div>
				</div>
				<div class="col-sm-2 hidden-xs link">&</div>
	
				<div class="col-sm-5 col-xs-12">
					<div class="vip-container">
						<h3 class="font-theme vip-name">{{ $bride->name }}</h3>
						<span class="font-theme">Daughter of</span> <br>
						<p>{{ $bride->father }} &</p>
						<p>{{ $bride->mother }}</p>
						<img src="{{ $bride->image->url_cache }}" alt="vip" class="img-responsive inline-block">
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
						<h1 class="font-theme color-theme"> {{ $event->name }} </h1>
					</div>

					<div class="col-xs-12 wedding-day-events-description">
						<p class="font-theme"> {!! $event->description !!} </p>
					</div>

					@if ($event->image)
						<div class="col-xs-12 wedding-day-events-image">
							<img src="{{ $event->image->url_cache }}" alt="event" class="img-responsive inline-block">
						</div>
					@endif
					<div class="col-xs-12 wedding-day-events-location">
						<h3>{!! $event->location !!}</h3>
					</div>
				</div>
			@endforeach		
		</div>

		{{-- Bridesmaid Bestmen section --}}
		<div class="row row-center wedding-day-bb">
			
			<div class="wedding-day-bb-title">
				<h1 class="font-theme color-theme">Bridesmaid & Bestman</h1>
			</div>
			<div class="wedding-day-bb-message">
				<p><i>Thank you for your support on our wedding</i></p>
			</div>
			
			@include('jsvar')
			<div class="col-xs-10 col-center">
				<div class="__react-root" id="BridesBestSlider"></div>
			</div>
		</div>

		{{-- Vendors section --}}
		<div class="row row-center wedding-day-vendors">
			<div class="wedding-day-vendors">
				<h1 class="font-theme color-theme">Our Vendors</h1>
			</div>
			<div class="col-md-4 col-center">
				<div class="wedding-day-vendors-table">
					@component('layouts.table')
						@slot('tableBody')
							@foreach ($vendors as $vendor)
								<tr>
									<td>{{ $vendor->name }}</td>
									<td>: {{ optional($vendor->category)->name ?? 'None' }}</td>
								</tr>
							@endforeach
						@endslot
					@endcomponent
				</div>
			</div>
		</div>
	</div>
@endsection