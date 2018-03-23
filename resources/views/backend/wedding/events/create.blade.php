@extends('layouts.submaster')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @component('layouts.panel', ['addButton' => ''])
                @slot('backButton')
                    @component('layouts.backButton', [
                        'text' => 'Show all events',
                        'url' => route('events.index')
                    ])
                        
                    @endcomponent
                @endslot
                @slot('title')
                    Create a new Event 
                @endslot


                @slot('body')
                    <form action="{{ route('events.store') }}" method="POST">
                        <div class="form-group">
                            <label for="formControlName">Event Name</label>
                            <input 
                                type="text" 
                                class="form-control" 
                                id="formControlName" 
                                name="name"
                            >
                        </div>

                        <div class="form-group">
                            <label for="formControlDescription">Event Description</label>
                            <input
                                type="text" 
                                class="form-control" 
                                id="formControlDescription" 
                                name="description"
                            >
                        </div>

                        <div class="form-group">
                            <label for="formControllocation">Event Location</label>
                            <input
                                type="text" 
                                class="form-control" 
                                id="formControllocation" 
                                name="location"
                            >
                        </div>
                        <div class="form-group">
                            <label for="formControldateTime">Event Date Time</label>
                            <input
								type="datetime-local" 
								value="{{ date('Y-m-d\TH:i:s') }}"
                                class="form-control" 
                                id="formControldateTime" 
                                name="datetime"
                            >
                        </div>
                        <button type="submit" class="btn btn-primary">Publish</button>

                    </form>
                    
                @endslot
            @endcomponent
        </div>
    </div>
@endsection