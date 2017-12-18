<div class="blog-post">
    <div class="col-md-6">
        <h2>{{ $post->title }}</h2>
        <p> {{ str_limit($post->body, 200, '...') }} </p>
        
        <a href="{{ route('post.read', ['page' => str_slug($page->title), 'post_title' => str_slug($post->title) ]) }}">
            Read More
        </a>
        <hr>
    </div>
</div>

