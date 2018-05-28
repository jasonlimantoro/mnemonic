@extends('layouts.submaster')

@section('content')
  <div class="row">
    <div class="col-md-12">
			@component('layouts.breadcrumb', ['current' => 'Albums'])
			@endcomponent
      @component('layouts.panel', [
        'title' => $album->name
      ])
        @slot('backButton')
          @component('layouts.backButton', [
            'text' => 'All Albums',
            'url' => route('albums.index')
          ])
            
          @endcomponent
        @endslot

        @slot('body')
					{{ Form::model($album, [
							'route' => ['albums.update', $album->id], 
							'method' => 'PATCH', 
							'enctype' => 'multipart/form-data',
						]) 
					}}
						@include('backend.website.albums.form', ['submitButtonText' => 'Update Album'])
						
					{{ Form::close() }}
        @endslot
      @endcomponent
    </div>
  </div>
@endsection