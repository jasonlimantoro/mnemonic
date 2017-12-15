<tr class="post">
    <td>
        <a href="{{ route('post.edit', ['post' => $post->id ]) }}" class="title">
            {{ $post->title }}
        </a>
    </td>
    <td class="body">
        {{ $post->body }}
        <div class="info">
            by {{ $post->user->name }} on {{ $post->created_at->toFormattedDateString() }} <br>
            Last updated: {{ $post->updated_at->diffForHumans() }}
        </div>
    </td>
    <td class="text-center">
        <div>
            <a href="{{ route('post.edit', ['post' => $post->id ]) }}" id="EditPostIcon" class="__react-root" role="button"></a>
        </div>
        <div>
            <a href="{{ route('post.delete', ['post' => $post->id ]) }}" id="DeletePostIcon" class="__react-root" role="button"></a>
        </div>
    </td>
</tr>

{{--  <div class="post">
    <a href="{{ route('post.edit', ['post' => $post->id ]) }}">
        <h2 class="title"> {{ $post->title }}</h2>
    </a>

    <p class="body">{{ $post->body }}</p>
    <a href="{{ route('post.delete', ['post' => $post->id ]) }}" id="DeletePostIcon" class="__react-root pull-right" role="button"></a>

    <div class="info">
        <p>
            by {{ $post->user->name }} on {{ $post->created_at->toFormattedDateString() }}
        </p>
        <p>
            Last updated: {{ $post->updated_at->diffForHumans() }}
        </p>
    </div>
    <hr>
</div>  --}}

