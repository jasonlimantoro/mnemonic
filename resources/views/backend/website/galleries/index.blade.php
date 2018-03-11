@extends('layouts.submaster')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @component('layouts.panel', ['backButton' => '', 'addButton' => ''])
                @slot('title')
                    Gallery
                @endslot

                @slot('addButton')
                    @component('layouts.addButton', [
                        'item' => 'Images',
                        'url' => route('images.create')
                    ])
                        
                    @endcomponent
                @endslot

                @slot('body')
                    <div class="row">
                        @foreach($galleryImages as $image)
                            <div class="col-md-4">
                                @component('layouts.thumbnail')
                                    @slot('thumbnailImage')
                                        <img src="{{ $image->url_cache }}" alt="image" class="img-responsive">
                                    @endslot

                                    @slot('thumbnailCaption')
                                        Name: 
                                        <a href="{{ route('album.images.edit', ['album' => $album->id, 'image' => $image->id]) }}">
                                            {{ $image->file_name }} 
                                        </a>
                                        
                                        <br>
                                        Album: 
                                        <a href="{{ route('albums.show', ['album' => $image->album_id ]) }}">
                                            {{ $image->album->name }}
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
                @endslot
            @endcomponent
        </div>
    </div>
@endsection