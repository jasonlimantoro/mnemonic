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
                <td>
                    <a href="{{ route('albums.show', ['album' => $album->id ]) }}">
                         {{ $album->name }} 
                    </a>
                </td>
                <td>{{ $album->description }}</td>
                
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
                        <a 
                            href="{{ route('albums.delete', ['album' => $album->id ]) }}" 
                            id="DeleteIcon" 
                            class="__react-root" 
                            role="button"
                            data-toggle="tooltip"
                            title="Delete this album"
                            data-placement="top"
                            >
                        </a>
                    </div>
                </td>
            </tr>
        @endforeach
            <tr>
                <td>
                    <a href="{{ route('albums.show', ['album' => $uncategorizedAlbum->id ]) }}">
                        Uncategorized
                   </a>
                </td>
                <td> <i>{{ $uncategorizedAlbum->description }}</i> </td>
                <td class="text-center"><i>No action</i></td>
            </tr>
        
    @endslot
@endcomponent
