<tr class="event">
  <td class="data title">
    @can('update', 'App\Models\Category')
      <a href="{{ route('categories.edit', ['category' => $category->id ]) }}">
        {{ $category->name }}
      </a>
    @else
      {{ $category->name }}
    @endif
  </td>
  <td class="data body">
    {{ $category->description }}
  </td>
  <td class="data action">
    @can('update', \App\Models\Category::class)
      <a
        href="{{ route('categories.edit', ['category' => $category->id ]) }}"
        role="button"
        data-toggle="tooltip"
        title="Edit"
        data-placement="top"
      >
        <i class="fa fa-pencil-square-o"></i>
      </a>

    @endcan

    @can('delete', \App\Models\Category::class)
      <div data-component="DeleteIcon"
           data-prop-url="{{ route('categories.destroy', [ 'category' => $category->id ]) }}"
      >
      </div>
    @endcan
  </td>
</tr>