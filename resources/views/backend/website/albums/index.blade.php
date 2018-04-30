@extends('layouts.submaster')

@section('content')
  <div class="row">
    <div class="col-md-12">
      @component('layouts.panel', [
        'title' => 'Albums'
      ])
        @slot('addButton')
          @component('layouts.addButton', [
            'url' => route('albums.create'),
            'item' => 'album'
          ])
          @endcomponent
        @endslot

				@slot('body')
					@component('layouts.table')
						@slot('tableHeader')
							<tr>
								<th class="col title">Name</th>
								<th class="col body">Description</th>
								<th class="col action">Action</th>
							</tr>
						@endslot
					
					
						@slot('tableBody')
							@foreach($albums as $album)
								<tr>
									<td class="data-table">
										<a href="{{ route('albums.show', ['album' => $album->id ]) }}">
											{{ $album->name }} 
										</a>
									</td>
									<td class="data-table">{{ $album->description }}</td>
									
									<td class="text-center">
										<div>
											<a 
												href="{{ route('albums.show', ['album' => $album->id ]) }}" 
												id="ShowIcon" 
												class="__react-root" 
												role="button"
												data-toggle="tooltip"
												title="See info about this album"
												data-placement="top"
												>
											</a>
										</div>
										<div>
											<a 
												href="{{ route('albums.edit', ['album' => $album->id ]) }}" 
												id="EditIcon" 
												class="__react-root" 
												role="button"
												data-toggle="tooltip"
												title="Edit this album"
												data-placement="top"
												>
											</a>
										</div>
										<div>
					
											<form action="{{ route('albums.destroy', ['album' => $album->id]) }}" method="POST" id={{ "form-delete-albums-" . $album->id  }}>
													{{ method_field('DELETE') }}
												<a 
													href="{{ route('albums.destroy', ['album' => $album->id ]) }}" 
													id="DeleteIcon" 
													class="__react-root" 
													data-form="albums-{{ $album->id }}"
													role="button"
													data-toggle="tooltip"
													title="Delete this album"
													data-placement="top"
													>
												</a>
											</form>
										</div>
									</td>
								</tr>
							@endforeach
								<tr>
									<td class="data-table">
										<a href="{{ route('albums.show', ['album' => $uncategorizedAlbum->id ]) }}">
											Uncategorized
										</a>
									</td>
									<td> <i>{{ $uncategorizedAlbum->description }}</i> </td>
									<td class="text-center"><i>No action</i></td>
								</tr>
							
						@endslot
					@endcomponent
        @endslot
      @endcomponent
    </div>
  </div>
@endsection