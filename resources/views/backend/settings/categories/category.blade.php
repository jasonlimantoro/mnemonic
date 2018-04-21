<tr class="event">
    <td class="data title">
        <a href="{{ route('categories.edit', ['category' => $category->id ]) }}">
			{{ $category->name }} 
		</a>
    </td>
    <td class="data body">
        {{ $category->description }}
    </td>
    <td class="data action text-center">
        <div>
            <a 
                href="{{ route('categories.show', ['category' => $category->id ]) }}" 
                id="ShowIcon" 
                class="__react-root" 
                role="button"
                data-toggle="tooltip"
                title="See info about this category"
                data-placement="top"
                >
            </a>
        </div>
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
    </td>
</tr>