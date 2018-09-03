@extends('layouts.master', ['pageTitle' => 'about'])


@section('content')
	<div class="container about-us-container">
		<div class="col-md-12">
			<div class="row page-title">
				<h1 class="color-theme font-theme">About</h1>
			</div>
			<div class="row">
				@foreach($posts as $post)
					<div class="col-md-12 post-content">
						<div class="col-md-8 post-detail">
							<div class="col-md-12">
								<h1 class="font-theme"> {{ $post->title }} </h1>
							</div>
							<div class="col-md-12 post-description">
								<p>{!! $post->description !!}</p>
							</div>
						</div>
						<div class="col-md-4 post-image">
							@if(null !== $post->image())
								<img src="{{ $post->image()->urlCache("vip") }}" alt="{{ $post->title }}" class="img-responsive">
							@endif
						</div>
					</div>
				@endforeach
			</div>
		</div>
	</div>
@endsection