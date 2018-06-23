@extends('layouts.master')

@section('content')
	<div class="container-fluid gallery-container">
		<div class="row page-title">
			<h1 class="color-theme font-theme">Our Gallery</h1>
		</div>
		<div class="row row-center">
			<div class="col-xs-10 col-center">
				@react("AlbumSlider")
			</div>
		</div>
	</div>
@endsection