@extends('layouts.submaster')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @component('layouts.panel')
                @slot('heading')
                    Groom and Bride page
                @endslot

                @slot('body')
                    Groom and Bride body
                @endslot
            @endcomponent
        </div>
    </div>
@endsection