@extends('layouts.submaster')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @component('layouts.panel', ['backButton' => '', 'addButton' => ''])
                @slot('title')
                    {{ $album->name}}
                @endslot

                @slot('body')
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
                                        <img src="{{ $image->url_asset }}" alt="image" class="img-responsive">
                                    </td>
                                    <td>{{ $image->file_name }}</td>
                                    <td class="text-center">
                                        <div>
                                            <a 
                                                href="#" 
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
                                                href="#" 
                                                id="EditIcon" 
                                                class="__react-root" 
                                                role="button"
                                                data-toggle="tooltip"
                                                title="Edit this image"
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
                                                title="Delete this image"
                                                data-placement="top"
                                                >
                                            </a>
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