<div class="blog-post">
    <h2>{{ $post->title }}</h2>
    <p> {{ $post->body }} </p>
    
    <a href="{{ route('post.read', ['page' => str_slug($page->title), 'post_title' => str_slug($post->title) ]) }}">
        <p>Read More</p>
    </a>
    <hr>
</div>

