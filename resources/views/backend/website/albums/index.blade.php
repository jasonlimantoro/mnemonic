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
                    <a
                      href="{{ route('albums.show', ['album' => $album->id ]) }}"
                      role="button"
                      data-toggle="tooltip"
                      title="See info about this album"
                      data-placement="top"
                    >
                      <i class="fa fa-info-circle"></i>
                    </a>
                    <a
                      href="{{ route('albums.edit', ['album' => $album->id ]) }}"
                      role="button"
                      data-toggle="tooltip"
                      title="Edit this album"
                      data-placement="top"
                    >
                      <i class="fa fa-pencil-square-o"></i>
                    </a>
                    <div data-component="DeleteIcon"
                         data-prop-url="{{ route('albums.destroy', ['album' => $album->id ]) }}"
                    >
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
                <td class="data body"><i>{{ $uncategorizedAlbum->description }}</i></td>
                <td class="text-center data action">No action</td>
              </tr>

            @endslot
          @endcomponent
        @endslot
      @endcomponent
    </div>
  </div>
@endsection