@extends('layouts.submaster')

@section('content')
<div class="row">
    <div class="col-md-12">
      @component('layouts.panel', [
        'title' => "Users"
      ])
        @slot('addButton')
          @component('layouts.addButton', [
            'url' => route('users.create'),
            'item' => 'Users'
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
								<th class="col body">Role</th>
								<th class="col action">Action</th>
							</tr>
            @endslot
        
            @slot('tableBody')
              @foreach($users as $user)
                @include('backend.settings.users.user')
              @endforeach
            @endslot
        
          @endcomponent
        @endslot
      @endcomponent
    </div>
  </div>
@endsection