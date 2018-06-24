<tr class="post">
  <td class="data title">
    <a href="{{ route('posts.edit', ['post' => $post->id, 'page' => $page->id ]) }}">
      {{ $post->title }}
    </a>
  </td>
  <td class="data body">
    {!! $post->description !!}
  </td>
  <td class="data action">
    <div>
      <a 
        href="{{ route('posts.show', ['post' => $post->id, 'page' => $page->id ]) }}" 
        role="button"
        data-toggle="tooltip"
        title="See info about this post"
        data-placement="top"
      >
        <i class="fa fa-info-circle"></i>
      </a>
		</div>
		@can('update', App\Post::class)
			<div>
				<a 
					href="{{ route('posts.edit', ['post' => $post->id, 'page' => $page->id ]) }}"
					role="button"
					data-toggle="tooltip"
					title="Edit this post"
					data-placement="top"
        >
          <i class="fa fa-pencil-square-o"></i>
				</a>
			</div>
		@endcan

		@can('delete', App\Post::class)
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
		@endcan
  </td>
</tr>
