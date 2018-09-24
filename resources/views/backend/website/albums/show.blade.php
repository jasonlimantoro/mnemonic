@extends('backend.layouts.master')

@section('content')
  @component('backend.layouts.breadcrumb', ['current' => 'Albums'])
  @endcomponent
  @component('backend.layouts.panel')
    @slot('title')
      Album : {{ isset($album) ? $album->name : 'Uncategorized' }}
    @endslot

    @slot('backButton')
      @component('backend.layouts.backButton', [
        'text' => 'All Albums',
        'url' => route('albums.index')
      ])
      @endcomponent
    @endslot

    @isset($album)
      @slot('addButton')
        @component('backend.layouts.addButton', [
          'url' => route('album.images.create', ['album' => $album->id ]),
        ])
        @endcomponent
      @endslot
    @endisset

    @slot('body')
      @isset($album)
        <p>Description: <strong>{{ strip_tags($album->description) }}</strong> </p>
      @endisset
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
                <img src="{{ $image->urlCache('gallery') }}" alt="image" class="img-responsive">
              </td>
              <td>{{ $image->name }} @if($image->isFeatured()) <strong>(Featured)</strong> @endif </td>
              <td class="data action">
                <a
                  href="{{ route('images.show', ['image' => $image->id])}}"
                  role="button"
                  data-toggle="tooltip"
                  title="See info about this image"
                  data-placement="top"
                >
                  <i class="fa fa-info-circle"></i>
                </a>

                <a
                  href="{{ route('images.edit', ['image' => $image->id])}}"
                  role="button"
                  data-toggle="tooltip"
                  title="Assign this image to another album"
                  data-placement="top"
                >
                  <i class="fa fa-pencil-square-o"></i>
                </a>

                <div data-component="DeleteIcon"
                     data-prop-url="{{ route('images.destroy', ['image' => $image->id]) }}"
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