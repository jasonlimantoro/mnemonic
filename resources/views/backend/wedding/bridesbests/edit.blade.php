@extends('layouts.submaster')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @component('layouts.panel', [
				'title' => 'Edit Bridesmaid and Bestman'
			])
				@slot('backButton')
					@component('layouts.backButton', [
						'text' => 'Show all Bridesmaid and Bestmen',
						'url' => route('bridesmaid-bestmans.index')
					])
					@endcomponent
				@endslot
				@slot('body')
					<form action="{{ route('bridesmaid-bestmans.update', ['bridesmaid-bestman' => $bridesBest->id ]) }}" method="POST" enctype="multipart/form-data">
						{{ method_field('PATCH') }}
						<div class="col-md-6">
							<div class="form-group">
								<label for="name">Name</label>
								<input type="text" name="name" id="name" class="form-control" value="{{ $bridesBest->name }}">
							</div>
							<div class="form-group">
								<label for="testimony">Testimony</label>
								<textarea name="testimony" id="testimony" cols="30" rows="10" class="form-control">{{ $bridesBest->testimony }}</textarea>
							</div>
							<div class="form-group">
								<label for="account">Instagram Account</label>
								<div class="input-group">
									<div class="input-group-addon">@</div>
									<input type="text" name="ig_account" id="account" class="form-control" value="{{ $bridesBest->ig_account }}">
								</div>
							</div>
							<div class="form-group">
								<label class="radio-inline" for="genderFemale">
									<input 
										type="radio" 
										name="gender" 
										id="genderFemale" 
										value="female"
										@if ( $bridesBest->gender == 'female')
											checked	
										@endif
									> Bridesmaid 
								</label>
								<label class="radio-inline" for="genderMale">
									<input 
										type="radio" 
										name="gender" 
										id="genderMale" 
										value="male" 
										@if ( $bridesBest->gender == 'male')
											checked	
										@endif
									> Bestman 
								</label>
							</div>
							<button class="btn btn-primary" type="submit">Publish</button>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<p><strong>Current Image</strong></p>
								<div class="current-image">
									@if ($bridesBestImage)
										<img src="{{ $bridesBestImage }}" alt="event" class="img-responsive">
									@else
										<p>No Image uploaded</p>
									@endif	
								</div>
							</div>
							<div class="form-group">
								<div class="__react-root" id="FancyInput"></div>
							</div>
						</div>
					</form>
                @endslot
            @endcomponent
        </div>
    </div>
@endsection