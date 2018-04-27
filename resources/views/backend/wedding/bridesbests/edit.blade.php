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
					{{ Form::model($bridesBest, [
						'route' => ['bridesmaid-bestmans.update', $bridesBest->id], 
						'method' => 'PATCH', 
						'enctype' => 'multipart/form-data'
						]) 
					}}
						@include('backend.wedding.bridesbests.form', [
							'submitButtonText' => 'Update', 
							'displayCurrentImage' => true 
						])
					{{ Form::close() }}
        @endslot
      @endcomponent
    </div>
  </div>
@endsection