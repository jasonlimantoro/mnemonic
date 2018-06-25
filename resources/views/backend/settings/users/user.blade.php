<tr class="event">
  <td class="data title">
    @can('update', 'App\User')
      <a href="{{ route('users.edit', ['user' => $user->id ]) }}">
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
    @can('update', App\User::class)
      <a
        href="{{ route('users.edit', ['user' => $user->id ]) }}"
        role="button"
        data-toggle="tooltip"
        title="Edit this user"
        data-placement="top"
      >
        <i class="fa fa-pencil-square-o"></i>
      </a>
    @endcan

    @can('delete', App\User::class)
      <div data-component="DeleteIcon"
           data-prop-url="{{ route('users.destroy', [ 'user' => $user->id ]) }}"
      >
      </div>
    @endcan
  </td>
</tr>