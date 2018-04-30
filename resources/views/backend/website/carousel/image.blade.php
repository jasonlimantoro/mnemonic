<tr>
	<td class="data-table">
		<img src="{{ $image->url_cache }}" alt="carousel-image" class="img-responsive">
	</td>

	<td class="data-table">
		@include('layouts.caption')
	</td>
	
	<td class="text-center">
		<div>
			<a 
				href="{{ route('carousel.images.show', [ 'carousel' => 1, 'image' => $image->id ]) }}" 
				id="ShowIcon" 
				class="__react-root" 
				role="button"
				data-toggle="tooltip"
				title="See info about this image"
				data-placement="top"
				>
			</a>
		</div>
		<div>
			<a 
				href="{{ route('carousel.images.edit', [ 'carousel' => 1, 'image' => $image->id ]) }}" 
				id="EditIcon" 
				class="__react-root" 
				role="button"
				data-toggle="tooltip"
				title="Edit this image"
				data-placement="top"
				>
			</a>
		</div>
		<div>

			<form action="{{ route('carousel.images.destroy', ['carousel' => 1, 'image' => $image->id]) }}" method="POST" id={{ "form-delete-images-" . $image->id  }}>
				{{ method_field('DELETE') }}
				<a 
					href="" 
					id="DeleteIcon" 
					class="__react-root" 
					data-form="images-{{ $image->id}}"
					role="button"
					data-toggle="tooltip"
					title="Remove this image from the carousel"
					data-placement="top"
					>
				</a>
			</form>
		</div>
	</td>
</tr>