@extends('layouts.submaster')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @component('layouts.panel', [
				'title' => "Main Carousel"
			])
                @slot('backButton')
                    @component('layouts.backButton', [
                        'text' => 'Back',
                        'url' => route('carousel.index', ['carousel' => 1]),
                    ])
                        
                    @endcomponent
                @endslot
                @slot('body')
                    <h2> {{ $image->file_name }}</h2>
                    <img src="{{ $image->url_cache }}" alt="image" class="img-responsive">
                    Uploaded on {{ $image->created_at->toDayDateTimeString() }}
                    
                    <form 
                        method="POST"
                        enctype="multipart/form-data"
                        action="{{ route('carousel.images.update', ['carousel' => 1, 'image' => $image->id]) }}" 
					>
						{{ method_field('PATCH') }}
                        <div class="__react-root" id="FancyInput"></div>
                        <div class="form-group">
                            <label for="carouselCaption">Caption</label>
                            <textarea name="caption" class="form-control" id="carouselCaption" cols="30" rows="10" placeholder="Enter caption">{{ $image->caption }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Publish</button>
                    </form>
                    
                @endslot
            @endcomponent
        </div>
    </div>
@endsection