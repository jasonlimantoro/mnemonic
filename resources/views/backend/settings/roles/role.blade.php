<tr>
  <td class="data title">
    @can('update', 'App\Models\Role')
      <a href="{{ route('roles.edit', ['role' => $role->id ]) }}">
        {{ $role->name }}
      </a>
    @else
      {{ $role->name }}
    @endif
    <br>
    {{ $role->description }}
  </td>
  <td class="data body">
    <ul>
      @foreach ($role->permissions as $permission)
        <li>{{ $permission->name }}</li>
      @endforeach
    </ul>
  </td>
  <td class="data action">
    @can('update', App\Models\Role::class)
      <a
        href="{{ route('roles.edit', ['role' => $role->id ]) }}"
        role="button"
        data-toggle="tooltip"
        title="Edit"
        data-placement="top"
      >
        <i class="fa fa-pencil-square-o"></i>
      </a>
    @endcan

    @can('delete', App\Models\Role::class)
      <div data-component="DeleteIcon"
           data-prop-url="{{ route('roles.destroy', [ 'role' => $role->id ]) }}"
      >
      </div>
    @endcan
  </td>
</tr>