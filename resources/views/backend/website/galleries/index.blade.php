@extends('layouts.submaster')

@section('content')
  <div class="row">
    <div class="col-md-12">
      @component('layouts.panel', [
        'title' => "Gallery"
      ])
				@slot('addButton')
					@can('create', App\Image::class)
						@component('layouts.addButton', [
							'item' => 'Images',
							'url' => route('images.create')
						])
						@endcomponent
					@endcan
        @endslot

        @slot('body')
          <div class="row">
            @foreach($images as $image)
              <div class="col-md-4">
                @component('layouts.thumbnail')
                  @slot('thumbnailImage')
                    <img src="{{ $image->url_cache }}" alt="image" class="img-responsive">
                  @endslot

                  @slot('thumbnailCaption')
										Name: 
										@if (auth()->user()->can('update', App\Image::class))
											<a href="{{ route('album.images.edit', ['album' => $image->imageable->id, 'image' => $image->id]) }}">
												{{ str_limit($image->file_name, 40) }} 
											</a>
										@else
											{{ str_limit($image->file_name, 40) }} 
										@endif
                    
                    <br>
                    Album: 
                    <a href="{{ route('albums.show', ['album' => $image->imageable->id ]) }}">
                      {{ $image->imageable->name }}
										</a>
										@can('delete', App\Image::class)
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
										@endcan
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