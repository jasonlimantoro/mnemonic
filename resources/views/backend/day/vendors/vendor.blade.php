<tr>
  <td class="data title">
    @can('update', 'App\Models\Vendor')
      <a href="{{ subdomainRoute('vendors.edit', ['vendor' => $vendor->id ]) }}">
        {{ $vendor->name }}
      </a>
    @else
      {{ $vendor->name }}
    @endif
  </td>
  <td class="data body">
		{{ optional($vendor->category)->name ?? 'None' }}
  </td>
  <td class="data action">
    @can('update', App\Models\Vendor::class)
      <a
        href="{{ subdomainRoute('vendors.edit', ['vendor' => $vendor->id ]) }}"
        role="button"
        data-toggle="tooltip"
        title="Edit"
        data-placement="top"
      >
        <i class="fa fa-pencil-square-o"></i>
      </a>
    @endcan

    @can('delete', App\Models\Vendor::class)
      <div data-component="DeleteIcon"
           data-prop-url="{{ subdomainRoute('vendors.destroy', [ 'vendor' => $vendor->id ]) }}"
      >
      </div>
    @endcan
  </td>
</tr>
