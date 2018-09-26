<h1 class="color-theme post-title">{{ $post->title }}</h1>
@if(null !== $post->image())
  <div class="post-image">
    <img src="{{ $post->image()->urlCache("post") }}" alt="post-image" class="img-responsive">
  </div>
@endif
<p> {!! str_limit(strip_tags($post->description, "<h1><h2><h3><h4><p><i><span><b><img>"), 1000, '...') !!} </p>
<p>
  <a href="{{ subdomainRoute('front.posts.read', ['post' => $post->id, 'subdomain' => env('APP_SUBDOMAIN') ]) }}">
    Read More
  </a>
</p>

