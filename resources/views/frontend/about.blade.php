@extends('layouts.master')


@section('content')
	<div class="web-container">
		<div class="container about-us-container">
			<div class="col-md-12">
				<div class="row page-title font-theme">
					<h1 class="color-theme">About Us</h1>
				</div>
				<div class="row">
					@foreach($posts as $post)
						<div class="col-md-12 post-content">
							<div class="col-md-8 post-detail">
								<div class="col-md-12 font-theme">
									<h1> {{ $post->title }} </h1>
								</div>
								<div class="col-md-12 post-description">
									<p>{!! $post->description !!}</p>
								</div>
							</div>
							<div class="col-md-4 post-image">
								@isset($post->image)
									<img src="{{ $post->image->url_cache }}" alt="{{ $post->title }}" class="img-responsive"> 
								@endisset
							</div>
						</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
@endsection