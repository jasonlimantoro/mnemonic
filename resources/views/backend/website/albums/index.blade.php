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
                        @if ($album->name !== 'Uncategorized')
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
                                    href="#" 
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
                                    href="#" 
                                    id="DeleteIcon" 
                                    class="__react-root" 
                                    role="button"
                                    data-toggle="tooltip"
                                    title="Delete this album"
                                    data-placement="top"
                                    >
                                </a>
                            </div>
                        @endif
                    </td>


            </tr>
        @endforeach
        
    @endslot
@endcomponent
