@extends('layouts.submaster')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @component('layouts.panel', [
				'title' => "Create a new event"
			])
                @slot('backButton')
                    @component('layouts.backButton', [
                        'text' => 'Show all events',
                        'url' => route('events.index')
                    ])
                        
                    @endcomponent
                @endslot
				@slot('body')
					<form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="formControlName">Event Name</label>
									<input 
										type="text" 
										class="form-control" 
										id="formControlName" 
										name="name"
										placeholder="Enter name"
									>
								</div>
		
								<div class="form-group">
									<label for="formControlDescription">Event Description</label>
									<textarea 
										name="description" 
										id="formControlDescription" 
										cols="30" 
										rows="10" 
										placeholder="Enter Description" 
										class="form-control"
									></textarea>
								</div>

								<div class="form-group">
									<label for="formControllocation">Event Location</label>
									<input
										type="text" 
										class="form-control" 
										id="formControllocation" 
										name="location"
										placeholder="Enter location"
									>
								</div>
								<div class="form-group">
									<label for="formControldateTime">Event Date Time</label>
									<input
										type="datetime-local" 
										value="{{ date('Y-m-d\TH:i') }}"
										class="form-control" 
										id="formControldateTime" 
										name="datetime"
									>
								</div>
								<button type="submit" class="btn btn-primary">Publish</button>

							</div>
							<div class="col-md-6">
								<div class="form-group">
									<div class="__react-root" id="FancyInput"></div>
								</div>
							</div>
						</div>
					</form>
                @endslot
            @endcomponent
        </div>
    </div>
@endsection