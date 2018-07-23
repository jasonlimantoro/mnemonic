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
							@isset($post->image)
								<img src="{{ $post->image->url_cache }}" alt="{{ $post->title }}" class="img-responsive"> 
							@endisset
						</div>
					</div>
				@endforeach
			</div>
      <div class="row row-center">
        <div class="col-md-4 col-center post-pagination">
          {{ $posts->links() }}
        </div>
      </div>
		</div>
	</div>
@endsection