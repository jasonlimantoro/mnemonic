<div class="blog-post">
	<h1>{{ $post->title }}</h1>
	<p> {!! $post->description !!} </p>
	<a href="{{ route('front.posts.read', ['post' => $post->id ]) }}">
		Read More
	</a>
	<hr>
</div>

