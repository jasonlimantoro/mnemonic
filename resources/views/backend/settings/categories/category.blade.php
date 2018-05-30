<tr class="event">
  <td class="data-table title">
		@can('update', 'App\Category')
			<a href="{{ route('categories.edit', ['category' => $category->id ]) }}">
				{{ $category->name }} 
			</a>
		@else
			{{ $category->name }} 
		@endif
  </td>
  <td class="data-table body">
    {{ $category->description }}
  </td>
  <td class="data-table text-center">
		@can('update', App\Category::class)
			<div>
				<a 
					href="{{ route('categories.edit', ['category' => $category->id ]) }}" 
					id="EditIcon" 
					class="__react-root" 
					role="button"
					data-toggle="tooltip"
					title="Edit this category"
					data-placement="top"
					>
				</a>
			</div>
		@endcan

		@can('delete', App\Category::class)
			<div>
			<form action="{{ route('categories.destroy', [ 'category' => $category->id ]) }}" method="POST" id={{ "form-delete-categories-" . $category->id  }}>
				{{ method_field('DELETE') }}
				<a 
					href="" 
					id="DeleteIcon" 
					class="__react-root" 
					data-form="categories-{{ $category->id }}"
					role="button"
					data-toggle="tooltip"
					title="Delete this category"
					data-placement="top"
					>
				</a>
			</form>
			</div>
		@endcan
  </td>
</tr>