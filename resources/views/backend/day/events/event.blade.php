<tr>
  <td class="data title">
    @can('update', 'App\Models\Event')
      <a href="{{ subdomainRoute('events.edit', ['event' => $event->id ]) }}">
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
    @can('update', \App\Models\Event::class)
      <a
        href="{{ subdomainRoute('events.edit', ['event' => $event->id ]) }}"
        role="button"
        data-toggle="tooltip"
        title="Edit"
        data-placement="top"
      >
        <i class="fa fa-pencil-square-o"></i>
      </a>
    @endcan

    @can('delete', \App\Models\Event::class)
      <div data-component="DeleteIcon"
           data-prop-url="{{ subdomainRoute('events.destroy', [ 'event' => $event->id ]) }}"
      >
      </div>
    @endcan
  </td>
</tr>
