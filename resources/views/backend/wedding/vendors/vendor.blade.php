<tr class="vendor">
  <td class="data title">
    @can('update', 'App\Vendor')
      <a href="{{ route('vendors.edit', ['vendor' => $vendor->id ]) }}">
        {{ $vendor->name }}
      </a>
    @else
      {{ $vendor->name }}
    @endif
  </td>
  <td class="data body">
    <span class="label label-default">
			{{ optional($vendor->category)->name ?? 'None' }}
		</span>
  </td>
  <td class="data action">
    @can('update', App\Vendor::class)
      <a
        href="{{ route('vendors.edit', ['vendor' => $vendor->id ]) }}"
        role="button"
        data-toggle="tooltip"
        title="Edit this vendor"
        data-placement="top"
      >
        <i class="fa fa-pencil-square-o"></i>
      </a>
    @endcan

    @can('delete', App\Vendor::class)
      <div data-component="DeleteIcon"
           data-prop-url="{{ route('vendors.destroy', [ 'vendor' => $vendor->id ]) }}"
      >
      </div>
    @endcan
  </td>
</tr>
