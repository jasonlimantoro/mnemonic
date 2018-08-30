@extends('layouts.master', ['pageTitle' => 'gallery'])

@section('content')
	<div class="container-fluid gallery-container">
		<div class="row page-title">
			<h1 class="color-theme font-theme">Gallery</h1>
		</div>
		<div class="row row-center">
			<div class="col-xs-10 col-center">
        <div data-component="AlbumSlider"
             data-prop-image-route="{{ config('imagecache.route') }}"
        >
        </div>
			</div>
		</div>
	</div>
@endsection