<h1 class="color-theme post-title">{{ $post->title }}</h1>
@isset($post->image)
  <div class="post-image">
    <img src="{{ $post->image->url_cache }}" alt="post-image" class="img-responsive">
  </div>
@endisset
<p> {!! str_limit(strip_tags($post->description, "<h1><h2><h3><h4><p><i><span><b><img>"), 1000, '...') !!} </p>
<p>
  <a href="{{ route('front.posts.read', ['post' => $post->id ]) }}">
    Read More
  </a>
</p>

