@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2">

        </div>
        <div class="col-md-10 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    Welcome back {{ Auth::user()->name }} !
                    <div id="form"></div>
                    <div id="button"></div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
