<tr class="vendor">
    <td class="vendor-data title">
        <a href="{{ route('vendors.edit', ['vendor' => $vendor->id ]) }}">
			{{ $vendor->name }} 
		</a>
    </td>
    <td class="vendor-data body">
		<ul class="list-unstyled">
			@forelse ($vendor->categories as $category)
				<li>{{ $category->name }}</li>
			@empty
				<p><i>None</i></p>
			@endforelse
		</ul>
    </td>
    <td class="text-center">
        <div>
            <a 
                href="{{ route('vendors.show', ['vendor' => $vendor->id ]) }}" 
                id="ShowIcon" 
                class="__react-root" 
                role="button"
                data-toggle="tooltip"
                title="See info about this vendor"
                data-placement="top"
                >
            </a>
        </div>
        <div>
            <a 
                href="{{ route('vendors.edit', ['vendor' => $vendor->id ]) }}" 
                id="EditIcon" 
                class="__react-root" 
                role="button"
                data-toggle="tooltip"
                title="Edit this vendor"
                data-placement="top"
                >
            </a>
        </div>
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
    </td>
</tr>
