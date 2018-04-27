@extends('layouts.submaster')

@section('content')
  <div class="row">
    <div class="col-md-12">
      @component('layouts.panel', [
        'title' => $album->name
      ])
        @slot('backButton')
          @component('layouts.backButton', [
            'text' => 'Show all albums',
            'url' => route('albums.index')
          ])
            
          @endcomponent
        @endslot

        @slot('body')
					<p>Featured Image: </p>
					<img src="{{ $album->featuredImage()['url_cache'] }}" alt="featured-image" class="img-responsive featured-image">
					<h3>Change Featured Image</h3>
					{{ Form::model($album, [
							'route' => ['albums.update', $album->id], 
							'method' => 'PATCH', 
							'enctype' => 'multipart/form-data'
						]) 
					}}
						@include('backend.website.albums.form', ['submitButtonText' => 'Update Album'])
						
					{{ Form::close() }}
        @endslot
      @endcomponent
    </div>
  </div>
@endsection