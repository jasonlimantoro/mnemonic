
@extends('layouts.submaster')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @component('layouts.panel', ['backButton' => '', 'addButton' => ''])
                @slot('backButton')
                    @component('layouts.backButton', [
                        'text' => 'Back',
                        'url' => route('events.index'),
                    ])
                        
                    @endcomponent @endslot @slot('title')
                   Event: {{ $event->name }} 
                @endslot

                @slot('body')
					<form action="{{ route('events.update', ['event' => $event->id ]) }}" method="POST">
						{{ method_field('PATCH') }}
                        <div class="form-group">
                            <label for="formControlName">Event Name</label>
                            <input 
                                type="text" 
                                class="form-control" 
                                id="formControlName" 
								name="name"
								value="{{ $event->name }}"
                            >
                        </div>

                        <div class="form-group">
                            <label for="formControlDescription">Event Description</label>
							<textarea name="description" id="formControlDescription" cols="30" rows="10" placeholder="Enter Description" class="form-control">{{ $event->description }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="formControllocation">Event Location</label>
                            <input
                                type="text" 
                                class="form-control" 
                                id="formControllocation" 
                                name="location"
								value="{{ $event->location}}"
                            >
                        </div>
                        <div class="form-group">
                            <label for="formControldateTime">Event Date Time</label>
                            <input
								type="datetime-local" 
                                class="form-control" 
                                id="formControldateTime" 
                                name="datetime"
								value="{{ DateTime::createFromFormat('Y-m-d H:i:s', $event->datetime)->format('Y-m-d\TH:i') }}"
                            >
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>

                    </form>
                    
                @endslot
            @endcomponent
        </div>
    </div>
@endsection