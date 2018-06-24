<tr>
	<td class="data">
		<img src="{{ $image->url_cache }}" alt="carousel-image" class="img-responsive">
	</td>

	<td class="data">
		@include('backend.layouts.caption')
	</td>
	
	<td class="data action">
		@can('read-carousel-image')
			<div>
				<a 
					href="{{ route('carousel.images.show', ['carousel' => 1, 'image' => $image->id ]) }}" 
					role="button"
					data-toggle="tooltip"
					title="See info about this image"
					data-placement="top"
				>
          <i class="fa fa-info-circle"></i>
				</a>
			</div>
		@endcan

		@can('update-carousel-image')
			<div>
				<a 
					href="{{ route('carousel.images.edit', [ 'carousel' => 1, 'image' => $image->id ]) }}" 
					role="button"
					data-toggle="tooltip"
					title="Edit this image"
					data-placement="top"
				>
          <i class="fa fa-pencil-square-o"></i>
				</a>
			</div>
		@endcan

		@can('delete-carousel-image')
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
		@endcan
	</td>
</tr>