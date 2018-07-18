@extends('backend.layouts.master')

@section('content')
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
									{{ str_limit($image->file_name, 30) }} 
								</a>
                
                <br>
                Album: 
                <a href="{{ route('albums.show', ['album' => $image->imageable->id ]) }}">
                  {{ $image->imageable->name }}
								</a>
								<div data-component="DeleteIcon"
                     data-prop-url="{{ route('images.destroy', ['image' => $image->id]) }}"
                >
								</div>
              @endslot
            @endcomponent
          </div>
        @endforeach
      </div>
      {{ $images->links() }}
    @endslot
  @endcomponent
@endsection