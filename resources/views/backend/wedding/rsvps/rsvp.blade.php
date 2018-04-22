<tr>
	<td class="title">
		<p>
			<a href="{{ route('rsvps.edit', ['rsvp' => $rsvp->id ]) }}">
				{{ $rsvp->name }} 
			</a>
		</p>
		<p>{{ $rsvp->email }}</p>
		<p>{{ $rsvp->phone }}</p>

	</td>
	<td class="body">
		<p>Table Name: {{ $rsvp->table_name }}</p>
		<p>Total Invitation(s): {{ $rsvp->total_invitation }}</p>
		<p>Status : {{ $rsvp->status }}</p>
	</td>
	<td class="text-center">
		<div>
			<a 
				href="{{ route('rsvps.show', ['rsvp' => $rsvp->id ]) }}" 
				id="ShowIcon" 
				class="__react-root" 
				role="button"
				data-toggle="tooltip"
				title="See info about this rsvp"
				data-placement="top"
				>
			</a>
		</div>
		<div>
			<a 
				href="{{ route('rsvps.edit', ['rsvp' => $rsvp->id ]) }}" 
				id="EditIcon" 
				class="__react-root" 
				role="button"
				data-toggle="tooltip"
				title="Edit this rsvp"
				data-placement="top"
				>
			</a>
		</div>
		<div>
			<form action="{{ route('rsvps.destroy', [ 'rsvp' => $rsvp->id ]) }}" method="POST" id={{ "form-delete-rsvps-" . $rsvp->id  }}>
				{{ method_field('DELETE') }}
				<a 
					href="" 
					id="DeleteIcon" 
					class="__react-root" 
					data-form="rsvps-{{ $rsvp->id }}"
					role="button"
					data-toggle="tooltip"
					title="Delete this rsvp"
					data-placement="top"
				>
				</a>
			</form>
			@if (!$rsvp->reminder_count)
				<form action="{{ route('rsvps.remind', ['rsvp' => $rsvp->id ]) }}" method="POST">
					<button type="submit" class="btn btn-primary btn-block">Send Reminder</button>
				</form>
			@endif
		</div>
	</td>
</tr>
	