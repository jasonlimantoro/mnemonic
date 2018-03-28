<tr class="bridesmaid-bestman">
    <td class="event-data title">
        <a href="{{ route('bridesmaid-bestmans.edit', ['bridesmaid-bestman' => $b->id ]) }}">
			{{ $b->name }} 
		</a>
		<p>
			@if ($b->gender == 'female')
				<strong>Bridesmaid</strong>
			@else
				<strong>BestMan</strong>	
			@endif
		</p>
    </td>
    <td class="bridesmaid-bestman-data body">
        {{ $b->testimony }}
    </td>
    <td class="text-center">
        <div>
            <a 
                href="{{ route('bridesmaid-bestmans.show', ['bridesmaid-bestman' => $b->id ]) }}" 
                id="ShowIcon" 
                class="__react-root" 
                role="button"
                data-toggle="tooltip"
                title="See info about this bridesmaid-bestman"
                data-placement="top"
                >
            </a>
        </div>
        <div>
            <a 
                href="{{ route('bridesmaid-bestmans.edit', ['bridesmaid-bestman' => $b->id ]) }}" 
                id="EditIcon" 
                class="__react-root" 
                role="button"
                data-toggle="tooltip"
                title="Edit this bridesmaid-bestman"
                data-placement="top"
                >
            </a>
        </div>
        <div>

		<form action="{{ route('bridesmaid-bestmans.destroy', [ 'bridesmaid-bestman' => $b->id ]) }}" method="POST" id={{ "form-delete-bridesmaid-bestmans-" . $b->id  }}>
			{{ method_field('DELETE') }}
            <a 
                href="" 
				id="DeleteIcon" 
				class="__react-root" 
				data-form="bridesmaid-bestmans-{{ $b->id }}"
                role="button"
                data-toggle="tooltip"
                title="Delete this bridesmaid-bestman"
                data-placement="top"
                >
			</a>
		</form>
        </div>
    </td>
</tr>
