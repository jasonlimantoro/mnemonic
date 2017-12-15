<tr class="post">
    <td class="post-data title">
        <a href="{{ route('post.edit', ['post' => $post->id ]) }}">
            {{ $post->title }}
        </a>
    </td>
    <td class="post-data body">
        {{ $post->body }}
    </td>
    <td class="text-center">
        <div>
            <a href="{{ route('post.show', ['post' => $post->id ]) }}" id="InfoPostIcon" class="__react-root" role="button"></a>
        </div>
        <div>
            <a href="{{ route('post.edit', ['post' => $post->id ]) }}" id="EditPostIcon" class="__react-root" role="button"></a>
        </div>
        <div>
            <a href="{{ route('post.delete', ['post' => $post->id ]) }}" id="DeletePostIcon" class="__react-root" role="button"></a>
        </div>
    </td>
</tr>
