<div class="blog-post">
	<h2>{{ $post->title }}</h2>
	<p> {!! str_limit($post->description, 300, '...') !!} </p>
	<a href="{{ route('front.posts.read', ['post' => $post->id ]) }}">
		Read More
	</a>
	<hr>
</div>

