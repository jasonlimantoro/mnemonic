@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2">
                @include('layouts.sidebar')
            </div>
            <div class="col-md-10 col-md-offset-2">
                @component('layouts.panel')
                    @slot('heading')
                        Create A Post
                    @endslot

                    @slot('body')
                        <div id="form">
                            
                        </div>
                    @endslot

                @endcomponent
            </div>
        </div>
    </div>
@endsection

