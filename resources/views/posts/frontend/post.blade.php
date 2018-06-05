<h1 class="color-theme post-title">{{ $post->title }}</h1>
<p> {!! $post->description !!} </p>
<a href="{{ route('front.posts.read', ['post' => $post->id ]) }}">
  Read More
</a>

