<tr>
  <td class="data title">
    @can('update', 'App\Models\User')
      <a href="{{ subdomainRoute('users.edit', ['user' => $user->id ]) }}">
        {{ $user->name }}
      </a>
    @else
      {{ $user->name }}
    @endif
    <br>
    {{ $user->email }}
  </td>
  <td class="data body">
    {{ $user->role->name }}
  </td>
  <td class="data action">
    @can('update', App\Models\User::class)
      <a
        href="{{ subdomainRoute('users.edit', ['user' => $user->id ]) }}"
        role="button"
        data-toggle="tooltip"
        title="Edit"
        data-placement="top"
      >
        <i class="fa fa-pencil-square-o"></i>
      </a>
    @endcan

    @can('delete', App\Models\User::class)
      <div data-component="DeleteIcon"
           data-prop-url="{{ subdomainRoute('users.destroy', [ 'user' => $user->id ]) }}"
      >
      </div>
    @endcan
  </td>
</tr>