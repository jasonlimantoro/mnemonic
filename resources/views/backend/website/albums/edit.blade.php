@extends('backend.layouts.master')

@section('content')
	@component('backend.layouts.breadcrumb', ['current' => 'Albums'])
	@endcomponent
  @component('backend.layouts.panel', [
    'title' => $album->name
  ])
    @slot('backButton')
      @component('backend.layouts.backButton', [
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
@endsection