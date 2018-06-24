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
			<div>
				<a 
					href="{{ route('users.edit', ['user' => $user->id ]) }}" 
					role="button"
					data-toggle="tooltip"
					title="Edit this user"
					data-placement="top"
				>
          <i class="fa fa-pencil-square-o"></i>
				</a>
			</div>
		@endcan

		@can('delete', App\User::class)
			<div>
				<form 
					action="{{ route('users.destroy', [ 'user' => $user->id ]) }}" 
					method="POST" id={{ "form-delete-users-" . $user->id  }}
				>
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
		@endcan
  </td>
</tr>