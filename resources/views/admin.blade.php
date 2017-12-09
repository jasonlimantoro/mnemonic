@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-2">
            @include('layouts.sidebar')
        </div>
        <div class="col-md-10 col-md-offset-2">
            @component('layouts.panel')
                @slot('heading')
                    Dashboard
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
                        <button class="btn btn-primary">Create a Post</button>
                        <div id="buttonCreate"></div>
                    </a>
                @endslot

            @endcomponent
        </div>
    </div>
@endsection
