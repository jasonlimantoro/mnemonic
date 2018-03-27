@extends('layouts.submaster')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @component('layouts.panel', [
				'title' => "Gallery"
			])
                @slot('backButton')
                    @component('layouts.backButton', [
                        'text' => 'Show all galleries',
                        'url' => route('images.index')
                    ])
                        
                    @endcomponent
                @endslot

				@slot('body')
					<form action="{{ route('images.store') }} " method="POST" enctype="multipart/form-data">
						<div class="__react-root" id="FancyInput"></div>
						<div class="form-group">
							<label for="selectAlbum">Assign to Album: </label>
							<select name="album" id="selectAlbum" class="form-control">
								<option disabled>Select Album</option>
								@foreach ($albums as $album)
									<option value="{{ $album->id }}"> {{ $album->name }}</option>
								@endforeach
							</select>
						</div>	
						<div class="form-group">
							<button class="btn btn-primary" type="submit">Upload</button>
						</div>
					</form>
                @endslot
            @endcomponent
        </div>
    </div>
@endsection