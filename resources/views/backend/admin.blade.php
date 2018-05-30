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
								@can('read', App\Event::class)
									<li><a href="{{ route('events.index')}}">Manage Events</a></li>
								@endcan

								@can('read', App\BridesBest::class)
									<li><a href="{{ route('bridesmaid-bestmans.index')}}">Add Bridesmaid and Bestmen</a></li>
								@endcan

								@can('read', App\RSVP::class)
									<li><a href="{{ route('rsvps.index')}}">Add your RSVP</a></li>
								@endcan

								@can('read', App\Vendor::class)
									<li><a href="{{ route('vendors.index')}}">Add your vendor list</a></li>
								@endcan
							</ul>
						</div>
						<div class="col-md-6">
							<h3> Appearance </h3>
							<ul>
								@can('manage-gallery')
									<li><a href="{{ route('images.index') }}">Upload your photos</a></li>
									<li><a href="{{ route('albums.index')}}">Organize your photos in album</a></li>
								@endcan

								@can('read-carousel-image')
									<li><a href="{{ route('carousel.images.index', ['page' => 1]) }}">Edit Main Carousel</a></li>
								@endcan
							</ul>
						</div>
					</div>
        @endslot
      @endcomponent
    </div>
  </div>
@endsection
