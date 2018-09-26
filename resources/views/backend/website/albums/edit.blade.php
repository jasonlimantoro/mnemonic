@extends('backend.layouts.master')

@section('content')
	@component('backend.layouts.breadcrumb', ['current' => 'Edit'])
    <li><a href="{{ subdomainRoute('images.index') }}">Galleries</a></li>
    <li><a href="{{ subdomainRoute('albums.index') }}">Albums</a></li>
    <li><a href="{{ subdomainRoute('albums.show', ['album' => $album->id]) }}">{{ $album->name }}</a></li>
	@endcomponent
  @component('backend.layouts.panel', [
    'title' => $album->name
  ])

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