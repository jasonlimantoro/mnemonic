@extends('admin')

@section('panel-content')
    <div class="panel-heading">Dashboard</div>
    <div class="panel-body">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        Welcome back {{ Auth::user()->name }} !
        <a href="/admin/posts/create">
            <div id="buttonCreate"></div>
        </a>
    
    </div>
@endsection