@extends('backend.layouts.master')

@section('content')
  @component('backend.layouts.breadcrumb', ['current' => 'Albums'])
  @endcomponent
  @component('backend.layouts.panel', [
    'title' => 'Albums'
  ])
    @slot('addButton')
      @component('backend.layouts.addButton', [
        'url' => route('albums.create'),
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
            <th class="col-xs-3 title">Name</th>
            <th class="col-xs-6 body">Description</th>
            <th class="col-xs-1 action">Action</th>
          </tr>
        @endslot

        @slot('tableBody')
          @foreach($albums as $album)
            @include('backend.website.albums.album')
          @endforeach
          <tr>
            <td class="data title">
              <a href="{{ route('albums.show') }}"> Uncategorized </a>
            </td>
            <td class="data body"><i>No description</i></td>
            <td class="text-center data action">No action</td>
          </tr>
        @endslot
      @endcomponent
    @endslot
  @endcomponent
@endsection