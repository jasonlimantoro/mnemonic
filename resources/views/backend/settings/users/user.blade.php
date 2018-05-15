<tr class="event">
  <td class="data-table title">
    <a href="{{ route('users.edit', ['user' => $user->id ]) }}">
			{{ $user->name }}
    </a> <br>
		{{ $user->email }}
  </td>
  <td class="data-table body">
		{{ $user->role->name }}
  </td>
  <td class="data-table text-center">
    <div>
      <a 
        href="{{ route('users.show', ['user' => $user->id ]) }}" 
        id="ShowIcon" 
        class="__react-root" 
        role="button"
        data-toggle="tooltip"
        title="See info about this user"
        data-placement="top"
        >
      </a>
    </div>
    <div>
      <a 
        href="{{ route('users.edit', ['user' => $user->id ]) }}" 
        id="EditIcon" 
        class="__react-root" 
        role="button"
        data-toggle="tooltip"
        title="Edit this user"
        data-placement="top"
        >
      </a>
    </div>
    <div>

    <form action="{{ route('users.destroy', [ 'user' => $user->id ]) }}" method="POST" id={{ "form-delete-users-" . $user->id  }}>
      {{ method_field('DELETE') }}
      <a 
        href="" 
        id="DeleteIcon" 
        class="__react-root" 
        data-form="users-{{ $user->id }}"
        role="button"
        data-toggle="tooltip"
        title="Delete this user"
        data-placement="top"
        >
      </a>
    </form>
    </div>
  </td>
</tr>