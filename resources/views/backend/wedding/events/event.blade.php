<tr class="event">
    <td class="event-data title">
        <a href="{{ route('events.edit', ['event' => $event->id ]) }}">
			{{ $event->name }} 
		</a>
		<p>
			{{ $event->datetime }}
		</p>
    </td>
    <td class="event-data body">
        {{ $event->description }}
    </td>
    <td class="text-center">
        <div>
            <a 
                href="{{ route('events.show', ['event' => $event->id ]) }}" 
                id="ShowIcon" 
                class="__react-root" 
                role="button"
                data-toggle="tooltip"
                title="See info about this event"
                data-placement="top"
                >
            </a>
        </div>
        <div>
            <a 
                href="{{ route('events.edit', ['event' => $event->id ]) }}" 
                id="EditIcon" 
                class="__react-root" 
                role="button"
                data-toggle="tooltip"
                title="Edit this event"
                data-placement="top"
                >
            </a>
        </div>
        <div>

		<form action="{{ route('events.destroy', [ 'event' => $event->id ]) }}" method="POST" id={{ "form-delete-events-" . $event->id  }}>
			{{ method_field('DELETE') }}
            <a 
                href="" 
				id="DeleteIcon" 
				class="__react-root" 
				data-form="events-{{ $event->id }}"
                role="button"
                data-toggle="tooltip"
                title="Delete this event"
                data-placement="top"
                >
			</a>
		</form>
        </div>
    </td>
</tr>
