<div class="blog-post">
    <a href="{{ route('admin') }}/posts/{{ $post->id }}/edit">
        <h2> {{ $post->title }}</h2>
    </a>

    <p>{{ $post->body }}</p>

    by {{ $post->user->name }} on {{ $post->created_at->toFormattedDateString() }}
    
    <hr>
</div>

