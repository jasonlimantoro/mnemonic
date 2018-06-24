<tr>
  <td class="data title">
    @can('update', 'App\Event')
      <a href="{{ route('events.edit', ['event' => $event->id ]) }}">
        {{ $event->name }}
      </a>
    @else
      {{ $event->name }}
    @endif
		<br>
   <span class="label label-primary">{{ $event->present()->prettyDatetime }}</span>
  </td>
  <td class="data body">
		{!! $event->description !!}
  </td>
  <td class="data action">
    @can('update', App\Event::class)
      <div>
        <a
          href="{{ route('events.edit', ['event' => $event->id ]) }}"
          role="button"
          data-toggle="tooltip"
          title="Edit this event"
          data-placement="top"
        >
          <i class="fa fa-pencil-square-o"></i>
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
