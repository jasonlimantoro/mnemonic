<tr class="event">
	<td class="data-table title">
		<a href="{{ route('roles.edit', ['role' => $role->id ]) }}">
			{{ $role->name }}
		</a> <br>
		{{ $role->description }}
	</td>
	<td class="data-table body">
		<ul>
			@foreach ($role->permissions as $permission)
				<li>{{ $permission->name }}</li>
			@endforeach
		</ul>
	</td>
	<td class="data-table text-center">
		<div>
			<a 
				href="{{ route('roles.show', ['role' => $role->id ]) }}" 
				id="ShowIcon" 
				class="__react-root" 
				role="button"
				data-toggle="tooltip"
				title="See info about this role"
				data-placement="top"
				>
			</a>
		</div>
		<div>
			<a 
				href="{{ route('roles.edit', ['role' => $role->id ]) }}" 
				id="EditIcon" 
				class="__react-root" 
				role="button"
				data-toggle="tooltip"
				title="Edit this role"
				data-placement="top"
				>
			</a>
		</div>
		<div>

		<form action="{{ route('roles.destroy', [ 'role' => $role->id ]) }}" method="POST" id={{ "form-delete-roles-" . $role->id  }}>
			{{ method_field('DELETE') }}
			<a 
				href="" 
				id="DeleteIcon" 
				class="__react-root" 
				data-form="roles-{{ $role->id }}"
				role="button"
				data-toggle="tooltip"
				title="Delete this role"
				data-placement="top"
				>
			</a>
		</form>
		</div>
	</td>
</tr>