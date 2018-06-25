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
      <a
        href="{{ route('events.edit', ['event' => $event->id ]) }}"
        role="button"
        data-toggle="tooltip"
        title="Edit this event"
        data-placement="top"
      >
        <i class="fa fa-pencil-square-o"></i>
      </a>
    @endcan

    @can('delete', App\Event::class)
      <div data-component="DeleteIcon"
           data-prop-url="{{ route('events.destroy', [ 'event' => $event->id ]) }}"
      >
      </div>
    @endcan
  </td>
</tr>
