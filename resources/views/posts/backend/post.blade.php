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
            <a 
                href="{{ route('post.show', ['post' => $post->id ]) }}" 
                id="ShowIcon" 
                class="__react-root" 
                role="button"
                data-toggle="tooltip"
                title="See info about this post"
                data-placement="top"
                >
            </a>
        </div>
        <div>
            <a 
                href="{{ route('post.edit', ['post' => $post->id ]) }}" 
                id="EditIcon" 
                class="__react-root" 
                role="button"
                data-toggle="tooltip"
                title="Edit this post"
                data-placement="top"
                >
            </a>
        </div>
        <div>
            <a 
                href="{{ route('post.delete', ['post' => $post->id ]) }}" 
                id="DeleteIcon" 
                class="__react-root" 
                role="button"
                data-toggle="tooltip"
                title="Delete this post"
                data-placement="top"
                >
            </a>
        </div>
    </td>
</tr>
