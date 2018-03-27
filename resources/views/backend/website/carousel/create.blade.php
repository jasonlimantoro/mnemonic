@extends('layouts.submaster')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @component('layouts.panel', [
				'title' => "Add an Image"
			])
                @slot('backButton')
                    @component('layouts.backButton', [
                        'text' => 'Back',
                        'url' => route('carousel.index', ['carousel' => 1]),
                    ])
                    @endcomponent
                @endslot
                @slot('body')
					<form method="POST" action="{{ route('carousel.images.store', ['carousel' => 1]) }}" enctype="multipart/form-data">
						<div class="__react-root" id="FancyInput"></div>
						<div class="form-group">
							<textarea class="form-control" name="caption" id="caption" cols="30" rows="10" placeholder="Enter caption"></textarea>
						</div>
						<div class="form-group">
							<button class="btn btn-primary" type="submit">Publish</button>
						</div>
                    </form>
                @endslot
            @endcomponent
        </div>
    </div>
@endsection
