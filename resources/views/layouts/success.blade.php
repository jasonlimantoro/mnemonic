@if( $flash = session('success_msg'))
    <div class="form-group">
        <div class="alert alert-success alert-dismissable">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {{ $flash }}
            @if(str_contains($flash, ['upload', 'image']))
                <img src="{{ asset(session('path')) }}" alt="upload" class="img-responsive">
            @endif
        </div>
    </div>
@endif