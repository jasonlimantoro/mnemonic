<div class="col-md-8">
	{{-- name field --}}
	<div class="form-group">
		{{ Form::label('name', 'Event Name') }}
		{{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Enter Name']) }}
	</div>

	{{-- description field --}}
  <div data-component="Editor"
       data-prop-name="description"
       data-prop-label="Description"
       data-prop-default-value="{!!isset($event) ? $event->description : '' !!}"
  >
  </div>

	{{-- location field --}}
  <div data-component="Editor"
       data-prop-name="location"
       data-prop-label="Location"
       data-prop-default-value="{{ isset($event) ? $event->location : '' }}"
  >
  </div>


	<div class="form-group">
		{{ Form::submit($submitButtonText, ['class' => 'btn btn-primary']) }}
	</div>

</div>
<div class="col-md-4">
 
	{{-- datetime field --}}
	<div class="form-group">
		{{ Form::label('datetime', 'Event Datetime') }}
		{{ Form::input('datetime-local', 'datetime', null, ['class' => 'form-control', 'placeholder' => 'Enter Datetime']) }}
	</div>
 
	@isset($event)
    <div class="form-group">
      <strong>Current Image</strong>
      <div class="current-image">
        @isset ($eventImage)
          <img src="{{ $eventImage }}" alt="event-image" class="img-responsive">
        @else
          <p>No image uploaded</p>
        @endisset
      </div>
    </div>
    <div data-component="DeleteButton"
         data-prop-url="{{ route('events.remove-image', ['event' => $event->id]) }}"
         data-prop-text="Remove Image"
         data-prop-has-image="{{ $event->images()->count() }}"
    >
    </div>
	@endisset
 
	<div class="form-group">
    <div data-component="FancyInput"
         data-prop-template="event"
         data-prop-initial-input-value="{{ isset($event) ? optional($event->image())->name : ''}}"
    >
    </div>
	</div>
</div>
