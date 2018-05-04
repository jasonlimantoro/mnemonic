@extends('layouts.submaster')
@section('content')
  <div class="row">
    <div class="col-md-12">
      @component('layouts.panel', [
        'title' => 'Dashboard',
      ])
      
        @slot('body')
          @if (session('status'))
          <div class="alert alert-success">
            {{ session('status') }}
          </div>
          @endif
          <p>
            Welcome back {{ Auth::user()->name }} !
          </p>
        @endslot
      @endcomponent
    </div>
  </div>
@endsection
