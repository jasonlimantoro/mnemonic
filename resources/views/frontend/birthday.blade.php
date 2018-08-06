@extends('layouts.master', ['pageTitle' => 'Wedding Day'])

@section('content')
	<div class="container-fluid text-center wedding-day-container">
		{{-- Overview Section --}}
		<div class="row row-center wedding-day-overview">
			<div class="col-xs-10 col-center">
				<div class="page-title">
					<h1 class="color-theme font-theme">Birthday</h1>
				</div>
				@isset($embed)
					<div class="embed-video">
						<div class="embed-responsive embed-responsive-16by9">
							<iframe class="embed-responsive-item" src="http://www.youtube.com/embed/{{ $embed->id }}"></iframe>
						</div>
					</div>
				@endisset
				<div class="col-xs-12 col-center">
					<h2>We would like to invite you to our birthday party</h2>
				</div>
				
				<div class="col-xs-12 col-md-10 col-center">
					<div class="vip-container">
						<h3 class="font-theme vip-name">{{ $vip->birthday_person->name }}</h3>
						<span class="font-theme vip-relation">Son of</span> <br>
						<div class="vip-parent">
							<p>{{ $vip->birthday_person->father }} &</p>
							<p>{{ $vip->birthday_person->mother }}</p>
						</div>
						<img src="{{ url('imagecache/vip/' . $vip->birthday_person->image) }}" alt="vip" class="img-responsive inline-block">
					</div>
				</div>
			</div>
		</div>

		{{-- Event Sections --}}
		<div class="row wedding-day-events">
			@foreach ($dates as $date=>$occurrences)
				<div class="col-xs-12 wedding-day-events-date">
					<h2>{{ $date }}</h2>
				</div>
        @foreach($occurrences as $event)
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
            
            <div class="col-xs-12 wedding-day-events-time">
              <p>{!! $event->present()->time !!}</p>
            </div>
            <div class="col-xs-12 wedding-day-events-location">
              <h3>{!! $event->location !!}</h3>
            </div>
          </div>
        @endforeach
			@endforeach
		</div>
	</div>
@endsection