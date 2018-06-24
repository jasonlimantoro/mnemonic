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
			<div>
				<a 
					href="{{ route('vendors.edit', ['vendor' => $vendor->id ]) }}" 
					role="button"
					data-toggle="tooltip"
					title="Edit this vendor"
					data-placement="top"
				>
          <i class="fa fa-pencil-square-o"></i>
				</a>
			</div>
		@endcan

		@can('delete', App\Vendor::class)
			<div>
			<form action="{{ route('vendors.destroy', [ 'vendor' => $vendor->id ]) }}" method="POST" id={{ "form-delete-vendors-" . $vendor->id  }}>
				{{ method_field('DELETE') }}
				<a 
					href="" 
					id="DeleteIcon" 
					class="__react-root" 
					data-form="vendors-{{ $vendor->id }}"
					role="button"
					data-toggle="tooltip"
					title="Delete this vendor"
					data-placement="top"
					>
				</a>
			</form>
			</div>
		@endcan
  </td>
</tr>
