@component('layouts.table')
    @slot('tableHeader')
        <tr>
            <th class="col title">Images</th>
            <th class="col body">Caption</th>
            <th class="col action">Action</th>
        </tr>
    @endslot

    @slot('tableBody')
        @foreach($images as $image)
            <tr>
                <td>
                    <img src="{{ $image->url_cache }}" alt="carousel-image" class="img-responsive">
                </td>

                <td>
                    {{ $image->caption }}
                </td>
                
                <td class="text-center">
                    <div>
                        <a 
                            href="#" 
                            id="InfoPostIcon" 
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
                            id="EditPostIcon" 
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
                            href="{{ route('carousel.image.delete', ['image' => $image->id ]) }}" 
                            id="DeletePostIcon" 
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