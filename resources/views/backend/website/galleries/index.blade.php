@extends('backend.layouts.master')

@section('content')
	@component('backend.layouts.breadcrumb', ['current' => 'Galleries'])
	@endcomponent
  @component('backend.layouts.panel')
    @slot('title')
      Galleries <small>({{ $images->total() }})</small>
    @endslot
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
									<img src="{{ $image->urlCache('gallery') }}" alt="image" class="img-responsive">
								</div>
              @endslot

              @slot('thumbnailCaption')
								Name: 
								<a href="{{ route('images.edit', ['image' => $image->id]) }}">
									{{ str_limit($image->name, 30) }}
								</a>
                
                <br>
                Album: 
                <a href="{{ route('albums.show', ['album' => $image->album->id ]) }}">
                  {{ $image->album->name }}
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