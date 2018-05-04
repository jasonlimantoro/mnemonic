<tr class="post">
  <td class="post-data title">
    <a href="{{ route('posts.edit', ['post' => $post->id, 'page' => $page->id ]) }}">
      {{ $post->title }}
    </a>
  </td>
  <td class="post-data body">
    {{ $post->description }}
  </td>
  <td class="text-center">
    <div>
      <a 
        href="{{ route('posts.show', ['post' => $post->id, 'page' => $page->id ]) }}" 
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
        href="{{ route('posts.edit', ['post' => $post->id, 'page' => $page->id ]) }}" 
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

    <form action="{{ route('posts.destroy', ['page' => $page->id, 'post' => $post->id ]) }}" method="POST" id={{ "form-delete-posts-" . $post->id  }}>
      {{ method_field('DELETE') }}
      <a 
        href="" 
        id="DeleteIcon" 
        class="__react-root" 
        data-form="posts-{{ $post->id }}"
        role="button"
        data-toggle="tooltip"
        title="Delete this post"
        data-placement="top"
        >
      </a>
    </form>
    </div>
  </td>
</tr>
