@extends('layouts.submaster')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @component('layouts.panel')
                @slot('heading')
                    <h1>Dashboard</h1>
                @endslot

                @slot('body')
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <p>
                        Welcome back {{ Auth::user()->name }} !
                    </p>
                    <a href="/admin/posts/create">
                        <div id="ButtonContainer" class="__react-root"></div>
                    </a>
                @endslot

            @endcomponent
        </div>
    </div>
@endsection
