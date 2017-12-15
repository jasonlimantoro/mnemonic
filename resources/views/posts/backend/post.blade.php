<div class="blog-post">
    <a href="{{ route('post.edit', ['post' => $post->id ]) }}">
        <h2> {{ $post->title }}</h2>
    </a>

    <p>{{ $post->body }}</p>

    by {{ $post->user->name }} on {{ $post->created_at->toFormattedDateString() }}

    <a href="{{ route('post.delete', ['post' => $post->id ]) }}" id="DeletePostIcon" class="__react-root pull-right" role="button"></a>
    
    <hr>
</div>

