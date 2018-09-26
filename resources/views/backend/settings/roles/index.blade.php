@extends('backend.layouts.master')

@section('content')
  @component('backend.layouts.breadcrumb', ['current' => 'Roles'])
  @endcomponent
  @component('backend.layouts.panel', [
    'title' => "Roles"
  ])
    @can('create', App\Models\Role::class)
      @slot('addButton')
        @component('backend.layouts.addButton', [
          'url' => subdomainRoute('roles.create'),
        ])
        @endcomponent
      @endslot
    @endcan
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
            <th class="col-xs-6 body">Permissions</th>
            <th class="col-xs-1 action">Action</th>
          </tr>
        @endslot

        @slot('tableBody')
          @foreach($roles as $role)
            @include('backend.settings.roles.role')
          @endforeach
        @endslot

      @endcomponent
    @endslot
  @endcomponent
@endsection