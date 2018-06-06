@extends('backend.layouts.master')

@section('content')
  <div class="row">
    <div class="col-md-12">
			@component('backend.layouts.breadcrumb', ['current' => 'Albums'])
			@endcomponent
      @component('backend.layouts.panel', [
        'title' => 'Create a new album'
      ])
        @slot('backButton')
          @component('backend.layouts.backButton', [
            'text' => 'All Albums',
            'url' => route('albums.index')
          ])
          @endcomponent
        @endslot

				@slot('body')
					{{ Form::open(['route' => 'albums.store', 'enctype' => 'multipart/form-data']) }}
						@include('backend.website.albums.form', ['submitButtonText' => 'Publish'])	
					{{ Form::close() }}
        @endslot
      @endcomponent
    </div>
  </div>
@endsection