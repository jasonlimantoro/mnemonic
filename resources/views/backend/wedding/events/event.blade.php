<tr>
  <td class="data-table title">
    @if (auth()->user()->can('update', 'App\Event'))
      <a href="{{ route('events.edit', ['event' => $event->id ]) }}">
        {{ $event->name }}
      </a>
    @else
      {{ $event->name }}
    @endif
		<br>
   <span class="label label-primary">{{ $event->datetime }}</span> 
  </td>
  <td class="data-table body">
		{!! $event->description !!}
  </td>
  <td class="text-center">
    @can('read', App\Event::class)
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
    @endcan

    @can('update', App\Event::class)
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
    @endcan

    @can('delete', App\Event::class)
      <div>
        <form action="{{ route('events.destroy', [ 'event' => $event->id ]) }}" 
              method="POST" 
              id={{ "form-delete-events-" . $event->id  }}
        >
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
    @endcan
  </td>
</tr>
