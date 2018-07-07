<tr>
  <td class="data title">
    @can('update', 'App\RSVP')
      <a href="{{ route('rsvps.edit', ['rsvp' => $rsvp->id ]) }}">
        {{ $rsvp->name }}
      </a>
    @else
      {{ $rsvp->name }}
    @endif
		<br>

		<a href="mailto:{{ $rsvp->email }}">{{ $rsvp->email }}</a>
		<br>
		{{ $rsvp->phone }} 
		<br>
    <small>RSVP Code : {{ str_pad($rsvp->id, 5, "#000", STR_PAD_LEFT) }}</small>
    <br>
    <small>Table Name: {{ $rsvp->table_name }}</small>
    <br>
    <small>Total Invitation(s): {{ $rsvp->total_invitation }}</small>
    <br>
    @if ( $rsvp->status == 'confirmed')
      <span class="label label-success">Status : {{ $rsvp->status }}</span>
    @elseif ($rsvp->status == 'pending')
      <span class="label label-warning">Status : {{ $rsvp->status }}</span>
    @else
      <span class="label label-danger">Status : {{ $rsvp->status }}</span>
    @endif
  </td>
  <td class="data action">
    @can('update', App\RSVP::class)
      <a
        href="{{ route('rsvps.edit', ['rsvp' => $rsvp->id ]) }}"
        role="button"
        data-toggle="tooltip"
        title="Edit"
        data-placement="top"
      >
        <i class="fa fa-pencil-square-o"></i>
      </a>

    @endcan

    @can('delete', App\RSVP::class)
      <div data-component="DeleteIcon"
           data-prop-url="{{ route('rsvps.destroy', [ 'rsvp' => $rsvp->id ]) }}"
      >
      </div>
    @endcan
    @can('update', App\RSVP::class)
      @unless ($rsvp->reminded() or $rsvp->confirmed())
        <form action="{{ route('rsvps.remind', ['rsvp' => $rsvp->id]) }}" method="POST">
          <input type="hidden" name="email" value="{{ $rsvp->email }}">
          <button type="submit" class="btn btn-danger">Send Reminder</button>
        </form>
      @endunless
    @endcan
  </td>
</tr>
	