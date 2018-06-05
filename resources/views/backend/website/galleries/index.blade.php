@extends('backend.layouts.master')

@section('content')
  <div class="row">
    <div class="col-md-12">
			@component('backend.layouts.breadcrumb', ['current' => 'Gallery'])
			@endcomponent
      @component('backend.layouts.panel', [
        'title' => "Gallery"
      ])
				@slot('addButton')
					@component('backend.layouts.addButton', [
						'item' => 'Images',
						'url' => route('images.create')
					])
					@endcomponent
        @endslot

        @slot('body')
          <div class="row">
            @foreach($images as $image)
              <div class="col-md-4">
                @component('backend.layouts.thumbnail', ['class' => 'thumbnail-gallery'])
									@slot('thumbnailImage')
										<div class="thumbnail-image">
											<img src="{{ $image->url_cache }}" alt="image" class="img-responsive">
										</div>
                  @endslot

                  @slot('thumbnailCaption')
										Name: 
										<a href="{{ route('album.images.edit', ['album' => $image->imageable->id, 'image' => $image->id]) }}">
											{{ str_limit($image->file_name, 40) }} 
										</a>
                    
                    <br>
                    Album: 
                    <a href="{{ route('albums.show', ['album' => $image->imageable->id ]) }}">
                      {{ $image->imageable->name }}
										</a>
										<div>
											<form action="{{ route('images.destroy', ['image' => $image->id]) }}" method="POST" id={{ "form-delete-images-" . $image->id  }}>
												{{ method_field('DELETE') }}
												<a 
													href="{{ route('images.destroy',['image' => $image->id ]) }}" 
													id="DeleteIcon" 
													class="__react-root" 
													data-form="images-{{ $image->id }}"
													role="button"
													data-toggle="tooltip"
													title="Delete this image"
													data-placement="top"
													>
												</a>
											</form>
										</div>
                  @endslot
                @endcomponent
              </div>
            @endforeach
          </div>
          {{ $images->links() }}
        @endslot
      @endcomponent
    </div>
  </div>
@endsection