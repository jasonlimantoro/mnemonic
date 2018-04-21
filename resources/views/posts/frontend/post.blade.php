<div class="blog-post">
	<h2>{{ $post->title }}</h2>
	<p> {{ str_limit($post->body, 300, '...') }} </p>
	<a href="{{ route('posts.read', ['post' => $post->id ]) }}">
		Read More
	</a>
	<hr>
</div>

