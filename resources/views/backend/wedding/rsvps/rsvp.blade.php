<tr>
	<td class="data-table title">
		<p>
			<a href="{{ route('rsvps.edit', ['rsvp' => $rsvp->id ]) }}">
				{{ $rsvp->name }} 
			</a>
		</p>
		<p>{{ $rsvp->email }}</p>
		<p>{{ $rsvp->phone }}</p>

	</td>
	<td class="data-table body">
		<small>RSVP Code : {{ str_pad($rsvp->id, 5, "#000", STR_PAD_LEFT) }}</small><br>
		<small>Table Name: {{ $rsvp->table_name }}</small><br>
		<small>Total Invitation(s): {{ $rsvp->total_invitation }}</small><br>
		@if ( $rsvp->status == 'confirmed')
			<span class="label label-success">Status : {{ $rsvp->status }}</span>
		@elseif ($rsvp->status == 'pending')
			<span class="label label-warning">Status : {{ $rsvp->status }}</span>
		@else
			<span class="label label-danger">Status : {{ $rsvp->status }}</span>
		@endif
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
				<form action="{{ route('rsvps.remind', ['rsvp' => $rsvp->id]) }}" method="POST">
					<input type="hidden" name="email" value="{{ $rsvp->email }}">
					<button type="submit" class="btn btn-danger btn-block">Send Reminder</button>
				</form>
			@endif
		</div>
	</td>
</tr>
	