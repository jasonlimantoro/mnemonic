@extends('backend.layouts.master')

@section('content')
	<div class="row">
		<div class="col-md-12">
			@component('backend.layouts.breadcrumb', ['current' => 'Embed'])
			@endcomponent

			@component('backend.layouts.panel', [
				'title' => 'Edit Embed Video URL'
			])
				@slot('body')
					<p>
						This embed video will appear on the <a href="{{ route('front.wedding') }}" target="_blank">wedding page</a> of the website
					</p>
					{{ Form::open(['route' => 'embedVideo.update', 'method' => 'PATCH']) }}
						{{-- embed_url field --}}
						<div class="form-group">
							{{ Form::label('embed_url', 'YouTube Video Url:') }}
							{{ Form::text('embed_url', optional($embed)->url, ['class' => 'form-control', 'placeholder' => 'Enter YouTube Video URL']) }}
						</div>	

						{{-- Submit Button --}}
						<div class="form-group">
								@can('update-embed-video')
									{{ Form::submit('Update', ['class' => 'btn btn-primary']) }}
								@else
									{!! Form::unauthorizedButton() !!}
								@endcan
						</div>
					{{ Form::close() }}
					
					<div class="preview-embed">
					@isset($embed->id)
						<div class="embed-responsive embed-responsive-16by9">
							<iframe class="embed-responsive-item" src="http://www.youtube.com/embed/{{ $embed->id }}"></iframe>
						</div>	
					@else
						<small>Unavailable preview</small>
					@endisset
					</div>
				@endslot
					
			@endcomponent
		</div>
	</div>
@endsection