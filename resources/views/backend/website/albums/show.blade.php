@extends('backend.layouts.master')

@section('content')
  @component('backend.layouts.breadcrumb', ['current' => $album->name])
    <li><a href="{{ subdomainRoute('images.index') }}">Galleries</a></li>
    <li><a href="{{ subdomainRoute('albums.index') }}">Albums</a></li>
  @endcomponent
  @component('backend.layouts.panel', ['title' => $album->name ])
    @unless($album->isDefault())
      @slot('addButton')
        @component('backend.layouts.addButton', [
          'url' => subdomainRoute('album.images.create', ['album' => $album->id ]),
        ])
        @endcomponent
      @endslot
    @endunless

    @slot('body')
      <p>Description: <strong>{{ strip_tags($album->description) }}</strong> </p>
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
                  href="{{ subdomainRoute('images.show', ['image' => $image->id])}}"
                  role="button"
                  data-toggle="tooltip"
                  title="See info about this image"
                  data-placement="top"
                >
                  <i class="fa fa-info-circle"></i>
                </a>

                <a
                  href="{{ subdomainRoute('images.edit', ['image' => $image->id])}}"
                  role="button"
                  data-toggle="tooltip"
                  title="Assign this image to another album"
                  data-placement="top"
                >
                  <i class="fa fa-pencil-square-o"></i>
                </a>

                <div data-component="DeleteIcon"
                     data-prop-url="{{ subdomainRoute('images.destroy', ['image' => $image->id]) }}"
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