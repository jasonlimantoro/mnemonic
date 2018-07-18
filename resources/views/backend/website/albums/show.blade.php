@extends('backend.layouts.master')

@section('content')
  @component('backend.layouts.breadcrumb', ['current' => 'Albums'])
  @endcomponent
  @component('backend.layouts.panel', [
    'title' => "Album: " . $album->name
  ])
    @slot('backButton')
      @component('backend.layouts.backButton', [
        'text' => 'All Albums',
        'url' => route('albums.index')
      ])
      @endcomponent
    @endslot

    @slot('addButton')
      @component('backend.layouts.addButton', [
        'url' => route('album.images.create', ['album' => $album->id ]),
        'item' => 'images'
      ])
      @endcomponent
    @endslot

    @slot('body')
      <p>
        Description: <strong>{!! $album->description !!}</strong>
      </p>
      @component('layouts.table')
        @slot('tableHeader')
          <tr>
            <th class="col-xs-3 title">Image</th>
            <th class="col-xs-6 body">File</th>
            <th class="col-xs-1 action">Action</th>
          </tr>
        @endslot

        @slot('tableBody')
          @foreach($images as $image)
            <tr>
              <td>
                <img src="{{ $image->url_cache }}" alt="image" class="img-responsive">
              </td>
              <td>{{ $image->file_name }}</td>
              <td class="data action">
                <a
                  href="{{ route('album.images.show', ['album' => $album->id, 'image' => $image->id])}}"
                  role="button"
                  data-toggle="tooltip"
                  title="See info about this image"
                  data-placement="top"
                >
                  <i class="fa fa-info-circle"></i>
                </a>

                <a
                  href="{{ route('album.images.edit', ['album' => $album->id, 'image' => $image->id])}}"
                  role="button"
                  data-toggle="tooltip"
                  title="Assign this image to another album"
                  data-placement="top"
                >
                  <i class="fa fa-pencil-square-o"></i>
                </a>

                <div data-component="DeleteIcon"
                     data-prop-url="{{ route('album.images.destroy', ['album' => $album->id, 'image' => $image->id]) }}"
                >
                </div>

              </td>
            </tr>
          @endforeach
        @endslot

      @endcomponent
    @endslot
  @endcomponent
@endsection