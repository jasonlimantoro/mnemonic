@if( $flash = session('success_msg'))
    <div class="form-group">
        {{--  <div class="col-md-offset-2 col-md-8">  --}}
        <div class="alert alert-success alert-dismissable">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {{ $flash }}
        </div>
        {{--  </div>  --}}
    </div>
@endif