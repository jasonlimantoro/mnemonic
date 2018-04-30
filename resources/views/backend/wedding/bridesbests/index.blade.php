@extends('layouts.submaster')

@section('content')
  <div class="row">
    <div class="col-md-12">
      @component('layouts.panel', [
        'title' => 'Bridesmaid and Bestman'
      ])
        @slot('addButton') 
          @component('layouts.addButton', [
            'item' => 'Bridesmaid / Bestman',
            'url' => route('bridesmaid-bestmans.create')
          ])
          @endcomponent
          
        @endslot
        @slot('body')
          @component('layouts.table')
            @slot('tableHeader')
              <tr>
                <th class="col title">Name</th>
                <th class="col body">Testimony</th>
                <th class="col action">Action</th>
              </tr>
            @endslot
        
            @slot('tableBody')
              @foreach($bridesBests as $b)
                @include('backend.wedding.bridesbests.bridesbest')
              @endforeach
            @endslot
        
          @endcomponent
        @endslot
      @endcomponent
    </div>
  </div>
@endsection