@extends('layouts.submaster')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @component('layouts.panel', [
				'title' => "Album: " . $album->name
			])
                @slot('backButton')
                    @component('layouts.backButton', [
                        'text' => 'Show all albums',
                        'url' => route('albums.index')
                    ])
                    @endcomponent
                @endslot

                @slot('addButton')
                    @component('layouts.addButton', [
                        'url' => route('album.images.create', ['album' => $album->id ]),
                        'item' => 'images'
                    ])
                    @endcomponent
                @endslot

                @slot('body')
                    <p>
                        Description: <strong>{{ $album->description }}</strong> 
                    </p>
                    @component('layouts.table')
                        @slot('tableHeader')
                            <tr>
                                <th class="col title">Image</th>
                                <th class="col body">File</th>
                                <th class="col action">Action</th>
                            </tr>
                        @endslot

                        @slot('tableBody')
                            @foreach($images as $image)
                                <tr>
                                    <td>
                                        <img src="{{ $image->url_cache }}" alt="image" class="img-responsive">
                                    </td>
                                    <td>{{ $image->file_name }}</td>
                                    <td class="text-center">
                                        <div>
                                            <a 
                                                href="{{ route('album.images.show', ['album' => $album->id, 'image' => $image->id])}}" 
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
                                                href="{{ route('album.images.edit', ['album' => $album->id, 'image' => $image->id])}}" 
                                                id="EditIcon" 
                                                class="__react-root" 
                                                role="button"
                                                data-toggle="tooltip"
                                                title="Assign this image to another album"
                                                data-placement="top"
                                                >
                                            </a>
                                        </div>
                                        <div>
										<form action="{{ route('images.destroy', ['image' => $image->id]) }}" method="POST" id={{ "form-delete-images-" . $image->id  }}>
												{{ method_field('DELETE') }}
												<a 
													href="" 
													id="DeleteIcon" 
													class="__react-root" 
													data-form="images-{{ $image->id}}"
													role="button"
													data-toggle="tooltip"
													title="Delete this image"
													data-placement="top"
													>
												</a>
											</form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @endslot
                    
                    @endcomponent
                @endslot
            @endcomponent
        </div>
    </div>
@endsection