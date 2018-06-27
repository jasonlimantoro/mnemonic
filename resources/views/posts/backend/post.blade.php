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
    <a
      href="{{ route('posts.show', ['post' => $post->id, 'page' => $page->id ]) }}"
      role="button"
      data-toggle="tooltip"
      title="See info about this post"
      data-placement="top"
    >
      <i class="fa fa-info-circle"></i>
    </a>

    @can('update', App\Post::class)
      <a
        href="{{ route('posts.edit', ['post' => $post->id, 'page' => $page->id ]) }}"
        role="button"
        data-toggle="tooltip"
        title="Edit this post"
        data-placement="top"
      >
        <i class="fa fa-pencil-square-o"></i>
      </a>

		@endcan
		
		@unless ($page->title === 'About Us')
			@can('delete', App\Post::class)
				<div
					data-component="DeleteIcon"
					data-prop-url="{{ route('posts.destroy', ['page' => $page->id, 'post' => $post->id ]) }}"
				>
				</div>
			@endcan
		@endunless
  </td>
</tr>
