@extends('layouts.submaster')

@section('content')
<div class="row">
    <div class="col-md-12">
      @component('layouts.panel', [
        'title' => "Roles"
      ])
        @slot('addButton')
          @component('layouts.addButton', [
            'url' => route('roles.create'),
            'item' => 'Roles'
          ])
          @endcomponent
        @endslot

				@slot('body')
					@component('layouts.query', [
						'title' => 'Name',
						'body' => 'Description'
					])
							
					@endcomponent
          @component('layouts.table')
            @slot('tableHeader')
							<tr>
								<th class="col title">Name</th>
								<th class="col body">Permissions</th>
								<th class="col action">Action</th>
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
    </div>
  </div>
@endsection