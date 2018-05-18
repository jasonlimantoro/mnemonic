@extends('layouts.submaster')
@section('content')
  <div class="row">
    <div class="col-md-12">
			@component('layouts.breadcrumb')
			@endcomponent
      @component('layouts.panel', [
				'title' => 'Dashboard',
			])
        @slot('body')
          <p> Welcome back {{ auth()->user()->name }} ! </p>

					<p> There are several tips to help you get started! </p>
					<div class="row">
						<div class="col-md-6">
							<h3> Wedding </h3>
							<ul>
								<li><a href="{{ route('events.index')}} ">Manage Events</a></li>
								<li><a href="{{ route('bridesmaid-bestmans.index')}}">Add Bridesmaid and Bestmen</a></li>
								<li><a href="{{ route('rsvps.index')}}">Add your RSVP</a></li>
								<li><a href="{{ route('vendors.index')}}">Add your vendor list</a></li>
							</ul>
						</div>
						<div class="col-md-6">
							<h3> Appearance </h3>
							<ul>
								<li><a href="{{ route('images.index') }}">Upload your photos</a></li>
								<li><a href="{{ route('albums.index')}}">Organize your photos in album</a></li>
								<li><a href="{{ route('carousel.images.index', ['page' => 1]) }}">Edit Main Carousel</a></li>
							</ul>
						</div>
					</div>
        @endslot
      @endcomponent
    </div>
  </div>
@endsection
