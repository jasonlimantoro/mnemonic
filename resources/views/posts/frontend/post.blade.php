<div class="blog-post">
    <h2>{{ $post->title }}</h2>
    <p> {{ $post->body }} </p>
    
    <a href="{{ route('post.read', ['post' => $post->id ]) }}">
        <p>Read More</p>
    </a>
    <hr>
</div>

