<tr>
  <td class="data title">
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
  <td class="data body">
    {!! $b->testimony !!}
  </td>
  <td class="data action">
    @can('update', App\BridesBest::class)
      <a
        href="{{ route('bridesmaid-bestmans.edit', ['bridesmaid-bestman' => $b->id ]) }}"
        role="button"
        data-toggle="tooltip"
        title="Edit"
        data-placement="top"
      >
        <i class="fa fa-pencil-square-o"></i>
      </a>
    @endcan

    @can('delete', App\BridesBest::class)
      <div data-component="DeleteIcon"
           data-prop-url="{{ route('bridesmaid-bestmans.destroy', [ 'bridesmaid-bestman' => $b->id ]) }}"
      >
      </div>
    @endcan
  </td>
</tr>
