@extends('backend.layouts.master')

@section('content')
  <div class="row">
    <div class="col-md-12">
			@component('backend.layouts.breadcrumb', ['current' => 'Bridesmaid & Bestman'])
			@endcomponent
      @component('backend.layouts.panel', ['title' => 'Bridesmaid / Bestman Information'])
        @slot('backButton')
          @component('backend.layouts.backButton', [
            'text' => 'All Bridesmaid / Bestmen',
            'url' => route('bridesmaid-bestmans.index')
          ])
            
          @endcomponent
        @endslot

        @slot('body')
        <div class="col-md-6">
					<p>
						Name : {{ $bridesBest->name }}
					</p>
          <p>
            Role : <strong> {{ $role }} </strong>
          </p>
          <p>
            Testimony: <strong>{{ $bridesBest->testimony }}</strong> 
          </p>
          <p>
            Instagram Account: <strong>{{ $bridesBest->ig_account }}</strong> 
          </p>
        </div>
        <div class="col-md-6">
          <div class="current-image">
            @if ($bridesBestImage)
              <img src="{{ $bridesBestImage }}" alt="event" class="img-responsive">
            @else
              <p>No Image uploaded</p>
            @endif	
          </div>
        </div>
      @endslot
      @endcomponent
    </div>
  </div>
@endsection