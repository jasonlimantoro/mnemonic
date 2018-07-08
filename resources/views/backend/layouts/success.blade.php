@if( $flash = session('success_msg'))
  <div class="alert alert-success alert-dismissable">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    {{ $flash }}
  </div>
@endif