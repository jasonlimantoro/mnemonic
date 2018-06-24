@extends('backend.layouts.master')

@section('content')
  <div class="row">
    <div class="col-md-12">
			@component('backend.layouts.breadcrumb', ['current' => 'Albums'])
			@endcomponent
      @component('backend.layouts.panel', [
        'title' => 'Albums'
      ])
        @slot('addButton')
          @component('backend.layouts.addButton', [
            'url' => route('albums.create'),
            'item' => 'album'
          ])
          @endcomponent
        @endslot

				@slot('body')
					@component('backend.layouts.query', [
						'title' => 'Name',
						'body' => 'Description'
					])
					@endcomponent
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
									<td class="data title">
										<a href="{{ route('albums.show', ['album' => $album->id ]) }}">
											{{ $album->name }} 
										</a>
									</td>
									<td class="data body">{!! $album->description !!}</td>
									
									<td class="data action">
										<div>
											<a 
												href="{{ route('albums.show', ['album' => $album->id ]) }}" 
												role="button"
												data-toggle="tooltip"
												title="See info about this album"
												data-placement="top"
											>
                        <i class="fa fa-info-circle"></i>
											</a>
										</div>
										<div>
											<a 
												href="{{ route('albums.edit', ['album' => $album->id ]) }}" 
												role="button"
												data-toggle="tooltip"
												title="Edit this album"
												data-placement="top"
											>
                        <i class="fa fa-pencil-square-o"></i>
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
									<td class="data title">
										<a href="{{ route('albums.show', ['album' => $uncategorizedAlbum->id ]) }}">
											Uncategorized
										</a>
									</td>
									<td class="data body"> <i>{{ $uncategorizedAlbum->description }}</i> </td>
									<td class="text-center data action"><i>No action</i></td>
								</tr>
							
						@endslot
					@endcomponent
        @endslot
      @endcomponent
    </div>
  </div>
@endsection